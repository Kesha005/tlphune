<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\etrap;
use App\Models\welayat;
use Illuminate\Http\Request;

class placecontrol extends Controller
{

    public function index()
    {
        $welayats=welayat::all();
        return view('admin.place.index',compact('welayats'));
    }

  
    public function create()
    {
        
    }

  
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        welayat::create($request->all());
        return redirect()->route('admin.place.index');
    }

    public function show($id)
    {
        $welayat=welayat::with('etrap')->where('id',$id)->first();
    }

   
    public function edit($id)
    {
        $welayat=welayat::find($id);
        return view('admin.place.edit',compact('welayat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required']);$welayat=welayat::find($id);
        $welayat->update($request->all());
        return redirect()->route('admin.place.index');

    }

  
    public function destroy($id)
    {
        etrap::where('welayat_id',$id)->delete();
        welayat::where('id',$id)->delete();
        return redirect()->route('admin.place.index');
    }
}
