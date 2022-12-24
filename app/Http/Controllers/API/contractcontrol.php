<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\contract;
use Illuminate\Http\Request;

class contractcontrol extends Controller
{
    public function index()
    {
        $contract=contract::all();
        return response()->json($contract);
    }
}
