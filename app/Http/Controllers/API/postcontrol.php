<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Http\Requests\neweventreq;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class postcontrol extends Controller
{

    public function edit($id)
    {
        $product=events::find($id);
        return response()->json($product);
    }


    public function type(Request $request)
    {
        $event=events::find($request->id);
        if($event->is_new==true) return $this->update($request,$event);
        else return $this->updatenew($request,$event);
    }

    public function updatenew(neweventreq $request,$event)
    {
        $event->update($request->all());
        return response()->json(['message'=>'Bildiriş üýtgedildi']);
    }

    public function updateold(eventrequest $request,$event)
    {
        
    }

    public function updateimg($request,$event)
    {

    }
}
