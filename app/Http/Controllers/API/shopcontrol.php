<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\shoprequest;
use App\Models\events;
use App\Models\shops;
use App\Models\welayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class shopcontrol extends Controller
{
    protected $text = 'Biraz garaşyň dükan entek tassyklanmady';


    public function index($id)
    {
        $shop = shops::where('user_id', $id)->first();

        if ($shop->status!=1) return $this->NotActivated();

        return response()->json($shop);
    }



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

    public function destroy($user_id)
    {
        $this->DestroyUserAndShopData($user_id);
        $this->DestroyUserAndShopFiles($user_id);

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

    protected function DestroyUserAndShopData($user_id)
    {
        shops::where('user_id', $user_id)->delete();
        events::where('shopid',$user_id)->delete();
    }

    protected function DestroyUserAndShopFiles($user_id)
    {
        $shop=shops::where('user_id',$user_id)->first();
        Storage::deleteDirectory("public/users/$user_id/shops/$shop->id");
    }

    public function shops()
    {
        $shops=shops::all();
        return response()->json($shops);
    }

    public function products($id)
    {
        $events = events::with('shop')->where('shop', $id)->where('status', 1)->orderBy('created_at', 'DESC')->get(['id','name','public_image','user_id','is_new','price','place','created_at','updated_at','mark_id','category_id'])->map(function ($item) {
            if($item->etrap)
            {
                $welayat=welayat::find($item->etrap->welayat_id); $place=$welayat->name.'/'.$item->etrap->name;
            }
           else{$place='Näbelli ýer';} 
            return (array)($item->toArray() +  ['welayat' =>$place]);
        });
        return response()->json($events);
    }
}
