<?php

namespace App\Listeners;

use App\Events\banuser_event;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class banuser_listener
{
   
    public function __construct()
    {
        //
    }

    
    public function handle(banuser_event $event)
    {
        $user=User::find($event->user_id)->toArray();
    }
}
