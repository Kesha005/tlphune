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
            return (array)($query->toArray() + ['all' => count($query->events)]+['success'=>count($query->events->where('status',1))]
        +['on_proses'=>count($query->events->where('status',0))]);
        });

        return response()->json($user);
 
    }

    public function success($user_id)
    {
        $events = events::where('user_id', $user_id)->where('status', 1)->get();
        return response()->json($events);
          
    }

    public function all($user_id)
    {
        $events = events::where('user_id', $user_id)->get();
        return response()->json($events);
    }

    public function onproses($user_id)
    {
        $events = events::where('user_id', $user_id)->where('status', 0)->get();
           
        return response()->json($events);
    }

   

}
