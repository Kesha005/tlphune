<?php

namespace App\Listeners;

use App\Events\limitevent;
use App\Models\User;

trait limilis
{
  
    public function ChangeLimitUser(int $limit)
    {
       return (bool)User::where('isban',0)->update(['eventlimit' => $limit]);
    }
}
