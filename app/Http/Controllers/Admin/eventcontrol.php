<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class eventcontrol extends Controller
{
    public function index()
    {
        $events=events::with('user','category','mark')->get();
        return view('admin.events.index',compact('events'));
    }

    public function show($event)
    {
        return view('admin.events.show',compact('event'));
    }

    public function destroy(events $event)
    {
<<<<<<< HEAD
        $id = $event->id;
        $img = events::find($event)->pluck('image');
        foreach ($img as $i) {
          File::delete('storage/' . $i);
        }
        $event->delete();
        return redirect()->route('admin.events.index');
=======
        $img = events::find($event)->pluck('image');
        foreach ($img as $i) {
            File::delete('storage/' . $i);
        }
        events::destroy($event);
    return redirect()->route('admin.events.index');
>>>>>>> 6859abc7f3cd909acd8e9bfe6a955f117cb07821
    }
}
