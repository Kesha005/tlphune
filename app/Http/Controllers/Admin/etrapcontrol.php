<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\etrap;
use App\Models\welayat;
use Illuminate\Http\Request;

class etrapcontrol extends Controller
{
   
    public function index()
    {
        $etraps=etrap::with('welayat')->get();
        $welayats=welayat::all();
        return view('admin.etrap.index',compact('etraps','welayats'));
    }

    public function create()
    {
        
    }

   
    public function store(Request $request)
    {
        $request->validate(['name'=>'required','welayat_id'=>'required']);
        etrap::create($request->all());
        return redirect()->route('admin.etrap.index');
    }

  
    public function show($id)
    {
        
    }

  
    public function edit($id)
    {
        $etrap=etrap::with('welayat')->where('id',$id)->first();
        $welayats=welayat::all();
        return view('admin.etrap.edit',compact('etrap','welayats'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate(['name'=>'required','welayat_id'=>'required']);
        $etrap=etrap::find($id);
        $etrap->update($request->all());
        return redirect()->route('admin.etrap.index');

    }

   
    public function destroy($id)
    {
        etrap::where('id',$id)->delete();
        return redirect()->route('admin.etrap.index');
    }

    public function backup()
    {
        etrap::where('welayat_id',2)->update(['welayat_id'=>1]);
        etrap::where('welayat_id',3)->update(['welayat_id'=>2]);
        etrap::where('welayat_id',4)->update(['welayat_id'=>3]);
        etrap::where('welayat_id',5)->update(['welayat_id'=>4]);
        etrap::where('welayat_id',6)->update(['welayat_id'=>5]);
        etrap::where('welayat_id',8)->update(['welayat_id'=>6]);
        return redirect()->route('admin.etrap.index');
    }
}
