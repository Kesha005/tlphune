<?php

namespace App\Listeners;

use App\Events\limitevent;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class limilis
{
  
    public function __construct(limitevent $limit)
    {
        
    }

  
    public function handle(limitevent $event)
    {
       $users=User::all();
       foreach($users->chunk(200) as $user)
       {
        $user->update(['eventlimit'=>$event->limit]);
       }
      
    }
}
