<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class addpostcontrol extends Controller
{
    public function add_event(Request $request)
    {
        $request->validate(['name'=>'required']);
        // $request['image'] = $request->image->store('users/'.Auth::user()->id.'/events/', 'public');
        $request['user_id']=Auth::user()->id;
        $event=events::create($request->all());
        return response()->json($event);
    }
}
