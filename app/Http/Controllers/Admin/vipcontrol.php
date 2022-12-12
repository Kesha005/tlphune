<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use Carbon\Carbon;
use Illuminate\Http\Request;

class vipcontrol extends Controller
{
    public function index()
    {
        $events=events::where('vip',1)->get();
        return view('admin.vip.index');
    }

    public function show()
    {

    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate(['to'=>'required']);
        $nums = array_map('intval', explode(',', request('vip')));
        for ($i = 0; $i < count($nums); ++$i) {
            $event = events::find($nums[$i]);
            $event->update(['vip'=>1,'to'=>Carbon::createFromFormat('Y-m-d H:i:s',$request->to)]);
        }
        return route('admin.events.index');
    }

    public function edit()
    {

    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
