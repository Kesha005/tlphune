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
        $events = events::with('user', 'category', 'mark')->get();
        return view('admin.events.index', compact('events'));
    }

    public function show($event)
    {
        return view('admin.events.show', compact('event'));
    }

    public function destroy(events $event)
    {
        $img = events::find($event)->pluck('image');
        $event->delete();
        return $this->destroy_img($img);
    }

    public function multi_del(Request $request)
    {
        $nums = array_map('intval', explode(',', request('msgdel')));
        for ($i = 0; $i < count($nums); ++$i) {
            $event = events::find($nums[$i]);
            $event->delete();
        }
        return redirect()->route('admin.events.index');
    }


    public function multi_check()
    {
        $nums = array_map('intval', explode(',', request('msgdel')));
        for ($i = 0; $i < count($nums); ++$i) {
            $event = events::find($nums[$i]);
            $event->update(['status' => 1]);
        }
        return redirect()->route('admin.events.index');
    }

    public function destroy_img($img)
    {
        foreach ($img as $i) {
            File::delete('storage/' . $i);
        }
        return redirect()->route('admin.events.index');
    }
}
