<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class banuser_event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $user_id;
   
    public function __construct($user_id)
    {
        $this->user_id=$user_id;
    }

   
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
