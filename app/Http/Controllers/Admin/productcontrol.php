<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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

    public function store(Request $request)
    {
        
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
