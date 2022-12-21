<?php

namespace App\Jobs;

use App\Services\FCMService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class sendpushnot implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $request;
    protected $user;

  
    public function __construct($request,$user)
    {
        $this->request=$request;
        $this->user=$user;
    }

  
    public function handle()
    {
        FCMService::send(
            $this->user->fcm_token,
            $this->request
        );
    }
}
