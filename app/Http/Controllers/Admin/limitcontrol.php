<?php

namespace App\Http\Controllers\Admin;

use App\Events\limitevent;
use App\Http\Controllers\Controller;
use App\Models\limit;
use Illuminate\Http\Request;

class limitcontrol extends Controller
{
    public function index()
    {
        $limit=limit::latest()->first();
        return view('admin.limit.index',compact('limit'));
    }

    public function store(Request $request)
    {
        $request->validate(['limit'=>'required|numeric']);
        limit::create($request->all());
        $limit=$request->limit;
        event(new limitevent($limit));
        return redirect()->route('admin.limit.index');
    }

    public function update(Request $request)
    {
        $request->validate(['limit'=>'required|numeric']);
        limit::latest()->first()->update($request->all());
        $limit=$request->limit;
        event(new limitevent($limit));
        return redirect()->route('admin.limit.index');
    }
}
