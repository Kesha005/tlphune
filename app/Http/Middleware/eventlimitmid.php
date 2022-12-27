<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class eventlimitmid
{
   
    public function handle(Request $request, Closure $next)
    {
        $user=User::find($request->user_id);
        if($user->eventlimit<=0==true)
        {
            return response()->json(['message'=>'Siziň günlük bildiriş sanyňyz tamamlandy.Has köp bildiriş goýmak üçin VIP dereje gerek']);
        }
        return $next($request);
    }
}
