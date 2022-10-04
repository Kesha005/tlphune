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
        $request->validate(['name'=>'required','image'=>'required',
        'price'=>'required','condition'=>'required','mark_id'=>'required']);
        $request['image'] = $request->image->store('files', 'public');
        $request['user_id']=Auth::user()->id;
        events::create($request->all());
    }
}
