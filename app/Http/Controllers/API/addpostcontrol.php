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
        $data=$request->only('user_id', 'category_id', 'name', 'mark_id', 'place', 'price', 'about');$image=$request->image[0]->resize(100,100);
        $data['public_image']=$image->store("users/$request->user_id",'public');
        $event = events::create($data);
        $this->storeimage($request, $event);
        return response()->json([
            'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);
    }



    public function storeimage($request, $event)
    {
        $validated = $request->file('image');

        Storage::disk('local')->makeDirectory("public/users/$event->user_id/events/$event->id");
        foreach ($validated as $img) {
            $image['event_id'] = $event->id;
            $image['image'] = $img->store("users/$event->user_id/events/$event->id", 'public');
            event_img::create($image);
        }
    }
}
