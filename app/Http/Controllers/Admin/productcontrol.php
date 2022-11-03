<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productrequest;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\marks;
use App\Models\category;
use Illuminate\Queue\Jobs\RedisJob;
use Illuminate\Support\Facades\File;

class productcontrol extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        $products=products::with('category','mark')->paginate(20);
        return view('admin.products.index',compact('products'));
=======
        $marks=marks::all();
        $categories=category::all();
        $products=products::with('category','mark')->paginate(20);
        return view('admin.products.index',compact('products','marks','categories'));
>>>>>>> 18d6ff46b809260d7f5e6fb5d1dccb77119ec937
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(productrequest $request)
    {
<<<<<<< HEAD
        $images=[];
        if($request->image)
        {
            foreach($request->image as $img)
            {
                $img_name=time().rand(1,99).'.'.$img->extension();
                $img->storeAs('public/products',$img_name);
                $images[]=$img_name;
            }
            $validated['image']=$images;
        }
        $this->saveproduct($validated);
        return '';
    }

    public function saveproduct($validated)
    {
=======
        $validated=$request->all();
        $validated['image']=$request->image->store('products','public');
        $this->saveproduct($validated);
        return redirect()->route('admin.products.index');
    }

    public function show($product)
    {
        
    }

    public function saveproduct($validated)
    {
>>>>>>> 18d6ff46b809260d7f5e6fb5d1dccb77119ec937
        products::create($validated);
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
        File::delete('storage/'.products::where('id',$product)->first()->pluck('image'));
        products::where('id',$product)->delete();
        return redirect()->route('admin.products.index');
    }
}
