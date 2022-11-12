<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class eventcontrol extends Controller
{
    public function index()
    {
        $events = events::with('user')->get();
        return view('admin.events.index', compact('events'));
    }

    public function show($id)
    {
        $event = events::with('mark', 'user')->find($id);
        return view('admin.events.show', compact('event'));
    }

    public function destroy()
    {
        $img = events::find(request('event'));
        events::destroy(request('event'));
        $this->destroy_img($img);
        return redirect()->route('admin.events.index');
    }

    public function multi_del(Request $request)
    {
        $nums = array_map('intval', explode(',', request('msgdel')));
        for ($i = 0; $i < count($nums); ++$i) {
            $event = events::find($nums[$i]);
            $this->destroy_img($event);
            $event->delete();
        }

        return redirect()->route('admin.events.index');
    }


    public function check($id)
    {
        events::where('id', $id)->update(['status' => 1]);
        return response()->json(['dataId'=>$id]);
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
        Storage::deleteDirectory("public/users/$img->user_id/events/$img->id");
    }

   
}
