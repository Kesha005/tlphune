<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\sendpushnot;
use App\Models\User;
use App\Services\FCMService;
use Illuminate\Http\Request;

class pushnotcontrol extends Controller
{
    public function index()
    {
        return view('admin.push.index');
    }

    public function send(Request $request)
    {
        foreach(User::where('isban',0) as $user)  // sendpushnot::dispatch($request->all(),$user);
        {
          
            FCMService::send(
                $user->fcm_token,
                [
                    'title' => 'your title',
                    'body' => 'your body',
                ]
            );
      
        }
        return redirect()->route('admin.push.index');
    }
         
            
}
