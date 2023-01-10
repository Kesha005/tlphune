<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productrequest;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\marks;
use App\Models\category;
use App\Models\colormodel;
use App\Models\events;
use App\Models\product_color;
use App\Models\product_img;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class productcontrol extends Controller
{
    public $validate= ['name'=>'required','public_image' => 'max:10000|mimes:jpeg,jpg,png','country'=>'required','mark_id'=>'required', 'category_id'=>'required','about'=>'required','ru'=>'required'];
    public function index()
    {
       
        $products = products::with('category', 'mark', 'image')->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $marks = marks::all();
        $categories = category::all();
        $colors = colormodel::all();
        return view('admin.products.create',compact('marks','categories','colors'));
    }

    public function store(productrequest $request)
    {
        $validated = $request->only('name', 'country', 'mark_id', 'category_id', 'about','ru','en');
        $path =  $request->image[0]; $filename=hash('sha256', $path).".".$path->extension();
        $image_resize = Image::make($path->getRealPath());$image_resize->resize(150, 150);
        $image_resize->save(storage_path("app/public/product_thumb/").$filename);
        $validated['public_image'] = "product_thumb/$filename";
        $product = products::create($validated);
        $this->storeimage($product, $request);
        $this->storecolor($request, $product);
        return redirect()->route('admin.products.create')->with('success','Haryt goşuldy');
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
        $images = product_img::where('product_id', $product->id)->get();
        return view('admin.products.edit',compact('product','marks','categories','images'));
    } 

    public function update(Request $request,$id)
    {
       
        $request->validate($this->validate);
        $validated=$request->only('name','country','mark_id','category_id','about','ru');  $product=products::find($id);
        if($request->image!=null)
        {
            $this->update_image($request, $id);
        }
        if($request->public_image!=null) 
        {
            File::delete("storage/".$product->public_image);
            $path =  $request->public_image; $filename =hash('sha256', $path).".".$request->file('public_image')->extension();
            $image_resize = Image::make($path->getRealPath());$image_resize->resize(150, 150); $image_resize->save(storage_path('app/public/product_thumb/'.$filename));
            $validated['public_image'] =  "product_thumb/$filename";$product->update($validated);
            return redirect()->route('admin.products.index');
        }
        $validated['public_image']=$product->public_image;
        $product->update($validated);
        return redirect()->route('admin.products.index');
       
    }

    public function remove_image(Request $request)
    {
        File::delete("storage/".product_img::find($request->id)->image);
        product_img::where('id',$request->id)->delete();
        return response()->json(['message'=>'success']);
    }

    public function update_image($request,$id)
    {
        $images = $request->file('image');
        foreach ($images as $image) {
            $file['product_id'] = $id;
            $file['image'] = $image->store("products/$id/", 'public');
            product_img::create($file);
        }
    }



    public function destroy($product)
    {
        $public_image=products::find($product);
        File::delete("storage/".$public_image->public_image); Storage::deleteDirectory("public/products/$product"); 
        product_img::where('product_id',$product)->delete();
        products::where('id', $product)->delete();product_color::where('product_id',$product)->delete();
        events::where('products_id',$product)->delete();

        return redirect()->route('admin.products.index');
    }


   
}
