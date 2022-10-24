<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\messages;
use Illuminate\Http\Request;

class msgcontrol extends Controller
{
    public function index()
    {
        return 'contact page';
    }

    public function store(Request $request)
    {
        $request->validate(['name'=>'required','email'=>'required','phone'=>'required','text'=>'required']);
        messages::create($request->all());
        return response()->json(['message'=>'Hat iberildi']);
    }
}
