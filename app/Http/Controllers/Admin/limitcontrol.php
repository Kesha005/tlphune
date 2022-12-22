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
        event(new limitevent($request->limit));
        return redirect()->route('admin.limit.index');
    }

    public function update(Request $request,$id)
    {
        $request->validate(['limit'=>'required|numeric']);
        limit::where('id',$id)->update($request->all());
        event(new limitevent($request->limit));
        return redirect()->route('admin.limit.index');
    }
}
