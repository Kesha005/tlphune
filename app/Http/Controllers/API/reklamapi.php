<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class reklamapi extends Controller
{
    public function home()
    {
        $adds=\App\Models\adds::where('location','home')->get();
        return response()->json($adds);
    }

    public function category()
    {
        $adds=\App\Models\adds::where('location','category')->get();
        return response()->json($adds);
    }

    public function product()
    {
        $adds=\App\Models\adds::where('location','product')->get();
        return response()->json($adds);
    }
}
