<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shopproducts;
use Illuminate\Http\Request;

class shopscontrol extends Controller
{
   
    public function index()
    {
        $products=shopproducts::with('products','c_products','shop')->where('shop_id',2)->get();
        return $products;
    }

    public function create()
    {
        //
    }

 
   
    public function show($id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
