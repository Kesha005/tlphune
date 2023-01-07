<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\adds;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class reklamcontrol extends Controller
{
    public function index()
    {
        $adds = adds::all();
        return view('admin.adds.index',compact('adds'));
    }

    public function create()
    {
        return view('admin.adds.create');
    }

    public function store(Request $request)
    {
        $add = $request->all();
        $add['image'] = $request->image->store('files', 'public');
        adds::create($add);
        return redirect()->route('admin.adds.create')->with('success','Reklama goşuldy');
    }

    public function show($id)
    {
        $add = adds::find($id);
        return $add;
    }

    public function edit($id)
    {
        $add = adds::find($id);
        return $add;
    }

    public function update(Request $request, $id)
    {
        
        if ($request['image'] != null) {
            File::delete('storage/' . adds::where('id', $id)->first()->image);
            $validateddata = $request->all(); $validateddata['image'] = $request->image->store('files', 'public');
            adds::where('id', $id)->update($validateddata);
            return redirect()->route('admin.adds.index');
        }
        return $this->update_nonimage($request, $id);
    }
    public function update_nonimage($request, $id)
    {
        adds::where('id', $id)->update(['name' => $request->name, 'location' => $request->location]);
      return redirect()->route('admin.adds.index');
    }

    public function destroy($id)
    {
        File::delete('storage/' . adds::where('id', $id)->first()->image);
        adds::where('id', $id)->delete();
        return redirect()->route('admin.adds.index');
    }
}
