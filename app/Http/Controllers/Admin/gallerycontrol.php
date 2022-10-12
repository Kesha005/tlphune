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
        $images=gallery::all();
        return view('admin.gallery.index',compact('images'));
    }

    public function destroy(gallery $image)
    {
        File::delete('storage/' . $image->image);
        $image->delete();
        return redirect()->route('admin.gallery.index');
    }

    public function store(Request $request)
    {
        $validateddata=$request->validate(['image'=>'required']);
        $validateddata['image'] = $request->image->store('files', 'public');
        gallery::create($validateddata);
        return redirect()->route('admin.gallery.index');
    }
}
