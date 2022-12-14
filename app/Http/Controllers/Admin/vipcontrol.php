<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class vipcontrol extends Controller
{
    public function index()
    {
        $events=events::where('vip',1)->get();
        return view('admin.vip.index',compact('events'));
    }

    public function show()
    {
}

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate(['in_to'=>'required']);
        $nums = array_map('intval', explode(',', request('vip')));
        for ($i = 0; $i < count($nums); ++$i) {
            events::where('id',$nums[$i])->update(['vip'=>1,'in_to'=>Carbon::parse($request->to)->format('Y-m-d H:i:s')]);
        }
        return redirect()->route('admin.events.index');
    }

    public function edit()
    {
    }

    public function update(Request $request)
    {
        $request->validate(['in_to'=>'required']);
        $nums = array_map('intval', explode(',', request('vip')));
        for ($i = 0; $i < count($nums); ++$i) {
            events::where('id',$nums[$i])->update(['in_to'=>Carbon::parse($request->to)->format('Y-m-d H:i:s')]);
        }
        return redirect()->route('admin.vip.index');
    }

    public function destroy()
    {

    }

    public function remove(Request $request)
    {
        $nums = array_map('intval', explode(',', request('msgdel')));
        for ($i = 0; $i < count($nums); ++$i) {
            events::where('id',$nums[$i])->update(['vip'=>0,'in_to'=>null]);
        }
        return redirect()->route('admin.vip.index');
    }
}
