<?php

namespace App\Providers;

use App\Events\banuser_event;
use App\Events\limitevent;
use App\Listeners\banuser_listener;
use App\Listeners\limilis;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
   
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

   
    public function boot()
    {
        //
    }
}
