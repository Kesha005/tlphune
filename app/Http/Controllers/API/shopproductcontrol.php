<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\products;
use App\Models\shopproducts;
use App\Models\shops;
use Illuminate\Http\Request;

class shopproductcontrol extends Controller
{
    public function index($id)
    {
        $shop = shops::where('user_id', $id)->get();
        $shop = $shop[0];
        $products = shopproducts::with('products', 'c_products')->where('shop_id', $shop->id)->get();
        return response()->json($products);
    }

    public function add(Request $request)
    {
        $request->validate(['shop_id' => 'required', 'products' => 'required']);

        for ($i = 0; $i < count($request->products); ++$i) {
            shopproducts::create(['shop_id' => $request->shop_id, 'product_id' => $request->products[$i]]);
        }
        
        return response()->json([
            'message' => 'Harytlar dükana goşuldy'
        ]);
    }

    public function remove(Request $request)
    {
        $request->validate(['products' => 'required']);
        $products = $request->products;
        for ($i = 0; $i < count($products); ++$i) {
            shopproducts::where('id', $products[$i])->delete();
        }
        return response()->json([
            'message' => 'Harytlar dükandan aýryldy'
        ]);
    }
}
