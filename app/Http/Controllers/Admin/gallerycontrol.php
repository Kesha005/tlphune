<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;

class gallerycontrol extends Controller
{
    public function index()
    {
        $images = gallery::all();
        return view('admin.gallery.index', compact('images'));
    }

    public function destroy($id)
    {
        $image=gallery::find($id);
        File::delete('storage/' . $image->image);
        $image->delete();
        return redirect()->route('admin.gallery.index');
    }

    public function store(Request $request)
    {
       $request->validate(['image' => 'required']);
       $validateddata=$request->all();
        $validateddata['image'] = $request->image->store('files', 'public');
        gallery::create($validateddata);
        return redirect()->route('admin.gallery.index');
    }

    public function edit($id)
    {
        $image = gallery::find($id);
        return view('admin.gallery.edit', compact('image'));
    }
    public function show()
    {

    }
    public function update(Request $request,$id)
    {
        $image = gallery::find($id);  $new = $request->all();
        if ($request->image != null) {
            File::delete('storage/' . $image->image); $new['image'] = $request->image->store('files', 'public');
        }else $new['image']=$image->image;
        $image->update($new);
        return redirect()->route('admin.gallery.index');  

    }

   
}
