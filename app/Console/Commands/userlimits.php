<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\limit;

class userlimits extends Command
{
   
    protected $signature = 'userlimit:control';

    protected $description = 'Controlling users daily post limit';

    protected $isban_false=0;

  
    public function __construct()
    {
        parent::__construct();
    }

   
    public function handle()
    {
        User::where('isban',$this->isban_false)->
        update([
            'eventlimit',limit::latest()->first()->limit
        ]);
    }
}
