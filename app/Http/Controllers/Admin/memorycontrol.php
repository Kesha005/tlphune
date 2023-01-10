<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\memory;
use Illuminate\Http\Request;

class memorycontrol extends Controller
{
    public function index()
    {
        $memories = memory::all();
        return view('admin.memory.index', compact('memories'));
    }

    public function create()
    {
        return view('admin.memory.create');
    }
    
    public function store(Request $request)
    {
        $request->validate(['type' => 'required', 'size' => 'required|numeric']);
        memory::create($request->all());
        return redirect()->route('admin.memory.index')->with('success', 'Başarnykly goşuldy');
    }


    public function show()
    {

    }

    public function edit($id)
    {
        $memory=memory::find($id);
        return view('admin.memory.edit', compact('memory'));
    }

    public function update(Request $request,$id)
    {
        $memory=memory::where('id', $id);
        $memory->update($request->all());
        return redirect()->route('admin.memory.index')->with('success', 'Başarnykly tamamlandy');
    }

    public function destroy($id)
    {
        memory::where('id',$id)->delete();
        return redirect()->route('admin.memory.index')->with('success', 'Başarnykly pozuldy');
    }
}
