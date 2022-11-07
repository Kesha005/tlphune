<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\events;
use App\Models\gallery;
use App\Models\marks;
use App\Models\messages;
use Illuminate\Http\Request;

class basecontrol extends Controller
{

    public function send_msg(Request $request)
    {
        $request->validate(['name' => 'required', 'email' => 'required', 'phone' => 'required', 'text' => 'required']);
        messages::create($request->all());
        return response()->json(['message' => 'Hat iberildi']);
    }

    public function get_events()
    {
        $events = events::with('image:id,event_id,image','category:id,name','mark:id,name')->has('user')->where('status', 1)->get()->map(function ($query) {
            return (array)($query->toArray() + ['user_phone' => $query->user->phone]);
        });

        return response()->json($events);
    }

    public function get_category()
    {
        $categories = category::all();
        return response()->json($categories);
    }


    public function images()
    {
        $images = gallery::all();
        return response()->json($images);
    }

    public function marks()
    {
        $marks = marks::all();
        return response()->json($marks);
    }

    public function category($id)
    {
        $events = events::with('user', 'mark')->where('category_id', $id)->get();
        return response()->json($events);
    }
}
