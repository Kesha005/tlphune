<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\design;
use Illuminate\Support\Facades\File;

class designcontrol extends Controller
{
    public function index()
    {
        $images=design::all();
        return view('admin.design.index',compact('images'));
    }

    public function store(Request $request)
    {
        $validateddata=$request->validate(['image'=>'required']);
        $validateddata['image'] = $request->image->store('design', 'public');
        design::create($validateddata);
        return redirect()->route('admin.design.index');
    }

    public function create()
    {}
    public function edit()
    {}

    public function update()
    {

    }

    public function download($id)
    {
        $image=design::find($id);
        return response()->download(storage_path('app/public/'.$image->image));
    }

    public function destroy( $id)
    {   $image=design::find($id);
        File::delete('storage/' . $image->image);
        $image->delete();
        return redirect()->route('admin.design.index');
    }

}
