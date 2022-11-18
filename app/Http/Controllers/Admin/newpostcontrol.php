<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\newevent;
use App\Models\products;
use Illuminate\Http\Request;

class newpostcontrol extends Controller
{
    public function index()
    {
        $events=newevent::all();
        return view('admin.new_event.index',compact('events'));
    }


    public function show($id)
    {
        $event=newevent::find($id);
        $product=products::with('image','mark','category')->where('id',$event->products_id)->first();
        return view('admin.new_event.show',compact('event','product'));
    }

    public function destroy($id)
    {
        newevent::where('id',$id)->delete();
        return redirect()->route('admin.new_event.index');
    }

    public function multi_del(Request $request)
    {
        $nums = array_map('intval', explode(',', request('msgdel')));
        for ($i = 0; $i < count($nums); ++$i) {
            $event = newevent::find($nums[$i]);
            $event->delete();
        }

        return redirect()->route('admin.events.index');
    }
}
