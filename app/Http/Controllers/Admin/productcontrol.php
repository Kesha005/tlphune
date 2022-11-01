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
        File::delete('storage/'.$product->image);
        products::where('id',$product)->delete();
        return redirect()->route('admin.products.index');
    }
}
