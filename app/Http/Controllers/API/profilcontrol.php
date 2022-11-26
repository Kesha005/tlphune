<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\events;
use App\Models\newevent;
use App\Models\User;
use Illuminate\Http\Request;

class profilcontrol extends Controller
{
    public function about($user_id)
    {
        $user = User::where('id', $user_id)->get()->map(function ($query) {
            return (array)($query->toArray() + ['all' => count($query->events)+count($query->newevents)]+['success'=>count($query->newevents)+count($query->events->where('status',1))]
        +['on_proses'=>count($query->events->where('status',0))]);
        });

        return response()->json($user);
 
    }

    public function success($user_id)
    {
        $events = events::where('user_id', $user_id)->where('status', 1)->get()->map(function ($query) {
            return (array)($query->toArray() + ['is_new' => false]);
        });

        $new_event = newevent::with('product:id,name,public_image,category_id')->get()->map(function ($item) use ($user_id) {
            if ($item->product->user_id == $user_id)  return (array)($item->toArray() + ['is_new' => true]);
        });

        $new_event = collect($new_event)->filter(function ($item) {
            return $item != null;
        });

        if (count($new_event) > 0) return $this->AddArrays($new_event, $events);
        return $this->AddArrays($events, $new_event);
    }

    public function all($user_id)
    {
        $events = events::where('user_id', $user_id)->get()->map(function ($query) {
            return (array)($query->toArray() + ['is_new' => false]);
        });

        $new_event = newevent::with('product:id,name,public_image,category_id')->get()->map(function ($item) use ($user_id) {
            if ($item->product->user_id == $user_id)  return (array)($item->toArray() + ['is_new' => true]);
        });

        $new_event = collect($new_event)->filter(function ($item) {
            return $item != null;
        });
    }

    public function onproses($user_id)
    {
        $events = events::where('user_id', $user_id)->where('status', 0)->get()->map(function ($query) {
            return (array)($query->toArray() + ['is_new' => false]);
        });
        return response()->json($events);
    }

    public function AddArrays($events, $new_event)
    {
        foreach ($events as $event) {
            $new_event[]  = $event;
        }

        return response()->json($new_event);
    }

}
