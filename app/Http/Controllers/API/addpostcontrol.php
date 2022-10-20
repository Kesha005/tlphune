<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addpostcontrol extends Controller
{
    public function add_event(eventrequest $request)
    {
        if($request['image1']!=null){
            $this->storemultiimage($request);
         }
         $this->storesingleimage($request);
    }
   

    public function storemultiimage($request)
    {
        $request['image']=$request->image->store("users/$request->user_id/events",'public');
        $request['image1']=$request->image->store("users/$request->user_id/events",'public');
        return $this->store($request);
    }

    public function storesingleimage($request)
    {
        $request['image']=$request->image->store("users/$request->user_id/events",'public');return $this->store($request);
    }

    public function store($request)
    {
        events::create($request->all());
        return response()->json([
            'message'=>'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);
    }
}
