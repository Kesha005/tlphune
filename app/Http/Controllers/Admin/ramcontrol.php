<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ram;
use Illuminate\Http\Request;

class ramcontrol extends Controller
{
    public function index()
    {
        $rams = ram::all();
        return view('admin.ram.index', compact('rams'));
    }

    public function create()
    {
        return view('admin.ram.create');
    }
    
    public function store(Request $request)
    {
        $request->validate(['type' => 'required', 'size' => 'required|numeric']);
        ram::create($request->all());
        return redirect()->route('admin.ram.index')->with('success', 'Başarnykly goşuldy');
    }


    public function show()
    {

    }

    public function edit($id)
    {
        $ram=ram::find($id);
        return view('admin.ram.edit', compact('ram'));
    }

    public function update(Request $request,$id)
    {
        ram::where('id', $id)->update($request->all());
        return redirect()->route('admin.ram.index')->with('success', 'Başarnykly tamamlandy');
    }

    public function destroy($id)
    {
        ram::where('id',$id)->delete();
        return redirect()->route('admin.ram.index')->with('success', 'Başarnykly pozuldy');
    }
}
