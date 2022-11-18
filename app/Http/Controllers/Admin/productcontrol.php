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
    public $validate= ['name'=>'required','public_image' => 'max:10000|mimes:jpeg,jpg,png','country'=>'required','mark_id'=>'required', 'category_id'=>'required','about'=>'required', 'en'=>'required','ru'=>'required'];
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

    public function store(productrequest $request)
    {
       

        $validated = $request->only('name', 'country', 'mark_id', 'category_id', 'about','ru','en');

        $path =  $request->image[0]; $filename = $path->getClientOriginalName();
        $image_resize = Image::make($path->getRealPath());$image_resize->resize(150, 150);
        $image_resize->save(storage_path('app/public/product_thumb/'.$filename));
        $validated['public_image'] = "product_thumb/$filename";
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
        $model=products::find($product);
        return view('admin.products.show',compact('model'));
    }

    public function edit($product)
    {
        $product=products::find($product);
        $marks=marks::all();
        $categories=category::all();
        return view('admin.products.edit',compact('product','marks','categories'));
    } 

    public function update(Request $request,$product)
    {
       
       
        $validated=$request->only('name','country','mark_id','category_id','about','ru','en'); 
        $product=products::find($product);
        if($request->public_image) 
        {
            File::delete("storage/".$product->public_image);
            $path =  $request->public_image; $filename = $path->getClientOriginalName();
            $image_resize = Image::make($path->getRealPath());$image_resize->resize(150, 150);
            $image_resize->save(storage_path('app/public/product_thumb/'.$filename));
            $validated['public_image'] = "product_thumb/$filename";
        }
        $validated['public_image']=$product->public_image;
        $product->update($validated);
        return redirect()->route('admin/products.index');
       
    }

    public function destroy($product)
    {
        Storage::deleteDirectory("public/products/$product");
        products::where('id', $product)->delete();
        File::delete("storage/".$product->public_image);
        return redirect()->route('admin.products.index');
    }


   
}
