<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\category;
use App\Models\colormodel;
use App\Models\etrap;
use App\Models\events;
use App\Models\gallery;
use App\Models\marks;
use App\Models\messages;
use App\Models\newevent;
use App\Models\products;
use App\Models\User;
use App\Models\welayat;
use ArrayIterator;
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
        $events = events::with('category', 'mark')->where('status', 1)->get();
        return response()->json($events);
    }

    public function get_category()
    {
        $category = category::all()->map(function ($query) {
            return (array)($query->toArray() + ['count' => count($query->events->where('status', 1))]);
        });

        return response()->json($category);
    }

    public function images()
    {
        $images = gallery::all();
        return response()->json($images);
    }

    public function models()
    {
        $models = products::with('color:id,code,tm,ru')->get(['id','name','public_image','mark_id','category_id']);
        return response()->json($models);
    }

    public function marks()
    {
        $marks = marks::all();
        return response()->json($marks);
    }

    public function category($id)
    {
        $events = events::where('category_id', $id)->where('status', 1)->orderBy('created_at', 'DESC')->get(['id','name','public_image','user_id','is_new','price','place','created_at','updated_at','mark_id','category_id'])->map(function ($item) {
            if($item->etrap)
            {
                $welayat=welayat::find($item->etrap->welayat_id); $place=$welayat->name.'/'.$item->etrap->name;
            }
           else{$place='Näbelli ýer';} 
            return (array)($item->toArray() +  ['welayat' =>$place]);
        });
        return response()->json($events);
    }



    public function filter($category_id, $mark_id)
    {

        $events = events::where('status', 1)->where('category_id', $category_id)->where('mark_id', $mark_id)->orderBy('created_at', 'DESC')->get(['id','name','public_image','user_id','is_new','price','place','created_at','updated_at','mark_id','category_id'])->map(function ($item) {
            if($item->etrap)
            {
                $welayat=welayat::find($item->etrap->welayat_id); $place=$welayat->name.'/'.$item->etrap->name;
            }
           else{$place='Näbelli ýer';} 
            return (array)($item->toArray() +  ['welayat' =>$place]);
        });
        return response()->json($events);
    }

    public function event($event_id)
    {
        $events = events::with('image', 'category:id,tm,ru,en', 'mark:id,name')->where('id', $event_id)->get()->map(function ($item) {
            if($item->etrap)
            {
                $welayat=welayat::find($item->etrap->welayat_id); $place=$welayat->name.' '.$item->etrap->name;
            }
           else{$place='Näbelli ýer';} 
            return (array)($item->toArray() + ['user_phone' => $item->user->phone]+ ['welayat' =>$place]);
        });
        $events['view']=$events['view']+1;
        return response()->json($events);
    }

    public function new($new_id)
    {
        $new_event = events::where('id', $new_id)->get()->map(function ($item) {
            if($item->etrap)
            {
                $welayat=welayat::find($item->etrap->welayat_id); $place=$welayat->name.' '.$item->etrap->name;
            }
            else {$place='Näbelli ýer';}$user_phone=User::find($item->user_id);$color=colormodel::find($item->color_id);
            return (array)($item->toArray() + ['user_phone'=>$user_phone->phone]+ ['welayat' =>$place]+['image'=>$item->product->image]
            +['color'=>$color] +['mark'=>$item->mark]+['ru'=>$item->product->ru]);
        });
        
        return response()->json($new_event);
    }
}
