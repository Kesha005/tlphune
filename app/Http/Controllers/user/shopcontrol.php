<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\shoprequest;
use App\Models\products;
use App\Models\shopproducts;
use App\Models\shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class shopcontrol extends Controller
{
    protected $text = 'Biraz garaşyň dükan entek tassyklanmady';

    public function store(shoprequest $request)
    {
        $request['image']=$request->image->store("users/$request->user_id/shops",'public');
        $shop = shops::create($request->all());
        return response()->json([
            'message' => 'Tabşyryk nobata goýuldy.Adminiň gözegçiliginden soň dükan açylar',
        ]);
    }

    public function update(Request $request, shops $shop)
    {
        // 
    }

    public function destroy(Request $request)
    {
        $this->DestroyUserAndShopData($request);
        $this->DestroyUserAndShopFiles($request);

        return response()->json([
            'message' => 'Dükan we ähli maglumatlary pozuldy'
        ]);
    }

    public function NotActivated()
    {
        return response()->json([
            'message' => $this->text,
        ]);
    }

    protected function DestroyUserAndShopData($request)
    {
        shops::where('user_id', $request->user_id)->delete();
        shopproducts::where('shop_id', $request->shop_id)->delete();
    }

    protected function DestroyUserAndShopFiles($request)
    {
        $this->delfiles(Storage::allFiles("public/users/$request->user_id/shops/"));
        $this->delfiles(Storage::allFiles("public/users/$request->user_id/products/"));
    }
}

