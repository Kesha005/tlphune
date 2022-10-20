<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\shoprequest;
use App\Models\products;
use App\Models\shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class shopcontrol extends Controller
{
    public function index($id)
    {
        $shop=shops::where('user_id',$id)->get();
       if($shop[0]->status==0){
        return response()->json([
            'message'=>'Biraz garaşyň dükan entek tassyklanmady',
        ]);
       }
       $this->activated($shop);
       
    }

    public function activated($shop)
    {
        return response()->json([
            'shop'=>$shop
           ]);
    }

    public function store(shoprequest $request)
    {
        $shop=shops::create($request->all());
        return response()->json([
            'message'=>'Tabşyryk nobata goýuldy.Adminiň gözegçiliginden soň dükan açylar',
        ]);
    }

    public function update(Request $request,shops $shop)
    {

    }

    public function destroy(Request $request)
    {
        shops::where('user_id',$request->user_id)->delete();
        products::where('shop_id',$request->shop_id)->delete();
        $shops=Storage::allFiles("public/users/$request->user_id/shops/");$this->delfiles($shops);
        $products=Storage::allFiles("public/users/$request->user_id/products/"); $this->delfiles($products);
        return response()->json([
            'message'=>'Dükan we ähli maglumatlary pozuldy'
        ]);
    }


    public function delfiles($path)
    {
        Storage::delete($path);

    }
}
