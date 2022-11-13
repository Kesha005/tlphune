<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productrequest;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\marks;
use App\Models\category;
use App\Models\colormodel;
use App\Models\product_color;
use App\Models\product_img;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class productcontrol extends Controller
{
    public function index()
    {
        $marks = marks::all();
        $categories = category::all();
        $colors = colormodel::all();
        $products = products::with('category', 'mark', 'image')->get();
        return view('admin.products.index', compact('products', 'marks', 'categories', 'colors'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
       
     
        
        $validated = $request->only('name', 'country', 'mark_id', 'category_id', 'about');
        $path =  $request->image[0];
        $filename = $path->getClientOriginalName();
        $image_resize = Image::make($path->getRealPath());
        $image_resize->resize(150, 150);
        $image_resize->save(storage_path("/app/public/") . $filename);
        $validated['public_image'] = "products/public_images/$filename";
        $product = products::create($validated);
        $this->storeimage($product, $request);
        $this->storecolor($request, $product);
        return redirect()->route('admin.products.index');
    }

    public function storeimage($product, $request)
    {
        $images = $request->file('image');
        Storage::disk('local')->makeDirectory("public/products/$product->id");
        foreach ($images as $image) {
            $file['product_id'] = $product->id;
            $file['image'] = $image->store("products/$product->id/", 'public');
            product_img::create($file);
        }
    }

    public function storecolor($request, $product)
    {
        $colors=$request->color;
        $product->color()->attach($colors);
    }

    public function show($product)
    {
    }

    public function edit($product)
    {
        return $product;
    }

    public function update()
    {
    }

    public function destroy($product)
    {
        Storage::deleteDirectory("public/products/$product");
        products::where('id', $product)->delete();
        return redirect()->route('admin.products.index');
    }

    public function view()
    {
        $all=products::with('color')->get();
        return $all;
    }
}
