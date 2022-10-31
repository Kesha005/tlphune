<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productrequest;
use App\Models\products;
use Illuminate\Http\Request;
use App\Models\marks;
use App\Models\category;

class productcontrol extends Controller
{
    public function index()
    {
        $marks=marks::all();
        $categories=category::all();
        $products=products::with('category','mark')->paginate(20);
        return view('admin.products.index',compact('products','marks','categories'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(productrequest $request)
    {
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

    public function show($product)
    {
        
    }

    public function saveproduct($validated)
    {
        products::create($validated);
    }

    public function edit($product)
    {
        return $product;
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
