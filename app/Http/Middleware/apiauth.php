<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class apiauth extends Middleware
{
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return response()->json([
                'message'=>'Içeri giriň ýa-da täze hasap açyň'
            ]);
        }
    }
}
