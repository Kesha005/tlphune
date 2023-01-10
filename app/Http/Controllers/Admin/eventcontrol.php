<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\event_img;
use App\Models\events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class eventcontrol extends Controller
{
    public function index()
    {
        $events = events::with('user')->where('is_new',false)->where('vip',0)->orderBy('created_at', 'DESC')->get();
        return view('admin.events.index', compact('events'));
    }

    public function show($id)
    {
        $event = events::with('mark', 'user','category')->find($id);
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


    public function check(Request $request)
    {
        events::where('id', $request->id)->update(['status' => 1]);
        if($request->ajax=='true')return response()->json(['dataId'=>$request->id]); 
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
        Storage::deleteDirectory("public/users/$img->user_id/events/$img->id"); File::delete("storage/".$img->public_image);
        event_img::where('event_id',$img->id)->delete();
    }


 

   
   
}
