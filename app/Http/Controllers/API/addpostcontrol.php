<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Models\event_img;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class addpostcontrol extends Controller
{


    public function add_event(eventrequest $request)
    {

        $event = events::create($request->only('user_id', 'category_id', 'name', 'mark_id', 'place', 'price', 'about'));
        return  $this->storeimage($request, $event);
        // return response()->json([
        //     'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        // ]);
    }


    public function storeimage($request, $event)
    {
        $validated = $request->file('image');
        $image1=[];
        Storage::disk('local')->makeDirectory("public/users/$event->user_id/events/$event->id");
        foreach ($validated as $img) {
            $image['event_id'] = $event->id;
            $image['image'] = $img->store("users/$event->user_id/events/$event->id", 'public');
            event_img::create($image);
            $image1[]=$image;
        }
        return response()->json($image1);
    }
}
