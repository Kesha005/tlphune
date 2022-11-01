<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Models\events;
use Illuminate\Support\Facades\Auth;

class addpostcontrol extends Controller
{


    public function add_event(eventrequest $request)
    {
    
        $validated=$request->all();
        $request['image1'] ? $this->storemultiimage($validated,$request):$this->storesingleimage($validated,$request);
        return response()->json([
            'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);
    }


    
    public function storemultiimage($validated,$request)
    {
        $validated['image'] = $request->image->store("users/$request->user_id/events", 'public');
        $validated['image1'] = $request->image1->store("users/$request->user_id/events", 'public');

        $this->store($validated);
    }

    public function storesingleimage($validated,$request)
    {
         $validated['image']=$request->image->store("users/$request->user_id/events", 'public');
         $this->store($validated);
    }

    public function store($validated)
    {
        events::create($validated);
    }
}
