<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\contractreq;
use App\Models\contract;
use Illuminate\Http\Request;

class contractcontrol extends Controller
{
    public function index()
    {
        $contracts=contract::get(['name','created_at','id']);
        return view('admin.contract.index',compact('contracts'));
    }

    public function create()
    {
        return view('admin.contract.create');
    }

    public function store(contractreq $request)
    {
        contract::create($request->all());
        return redirect()->route('admin.contract.create')->with('success','Şertnama goşuldy');
    }

    public function show($id)
    {
        $contract=contract::find($id);
        return view('admin.contract.show',compact('contract'));
    }

    public function edit($id)
    {
        $contract=contract::find($id);
        return view('admin.contract.edit',compact('contract'));
    }

    public function update(contractreq $request,$id)
    {
        $contract=contract::find($id);
        $contract->update($request->all());
        return redirect()->route('admin.contract.index');
    }

    public function destroy($id)
    {
        contract::where('id',$id)->delete();
        return redirect()->route('admin.contract.index');
    }
}
