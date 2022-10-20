<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productrequest;
use App\Models\products;
use Illuminate\Http\Request;

class productcontrol extends Controller
{
    public function index()
    {
        $products=products::paginate(20);
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {}

    public function store(productrequest $request)
    {
        $request->image1==null ?$request['image']=$request->image->store('files','public'):
        $request['image']=$request->image->store('files','public')&&$request['image1']=$request->image1->store('files','public');
        products::create($request->all);
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
