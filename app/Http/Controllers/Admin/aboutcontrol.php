<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\about;
use Illuminate\Http\Request;

class aboutcontrol extends Controller
{
    
    public function index()
    {
        $about=about::latest();
        return view('admin.about.index',compact('about'));
    }

    public function create()
    {
        //
    }

 
    public function store(Request $request)
    {
        $request->validate(['name'=>'required','text'=>'required']);
        about::create($request->all());
        return redirect()->route('admin.about.index');
    }

    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        $about=about::find($id);
        return view('admin.about.edit',compact('about'));
    }

  
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required','text'=>'required']);
        $about=about::find($id);
        $about->update($request->all());
        return redirect()->route('admin.public.index');
    }

 
    public function destroy($id)
    {
        return 'Aýdaý özüň Kerim';
    }
}
