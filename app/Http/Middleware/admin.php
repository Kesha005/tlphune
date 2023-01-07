<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class admin
{
   
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role=='user')
        {
            return redirect()->route('')->with(['messsage'=>'Giriş çäkelendirilen']);
        }
        return $next($request);
    }
}
