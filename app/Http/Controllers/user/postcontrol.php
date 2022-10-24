<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Models\events;
use Illuminate\Http\Request;

class postcontrol extends Controller
{
    public function add_event(eventrequest $request)
    {
        if ($request['image1']) $this->storemultiimage($request);

        $this->storesingleimage($request);
    }


    public function storemultiimage($request)
    {
        $request['image'] = $request->image->store("users/$request->user_id/events", 'public');
        $request['image1'] = $request->image1->store("users/$request->user_id/events", 'public'); 

        return $this->store($request);
    }

    public function storesingleimage($request)
    {
        $request['image'] = $request->image->store("users/$request->user_id/events", 'public');
        return $this->store($request);
    }

    public function store($request)
    {
        events::create($request->all());
        
        return redirect()->route('')->with(['message'=>'Bildiriş hasaba alyndy']);
    }
}
