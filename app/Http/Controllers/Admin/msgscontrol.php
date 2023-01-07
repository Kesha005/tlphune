<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class msgscontrol extends Controller
{

    public function index()
    {
        $msgs = messages::orderBy('created_at', 'DESC')->get();
        return view('admin.msgs.index', compact('msgs'));
    }


    public function create()
    {}


    public function store(Request $request)
    {}


    public function show(messages $msg)
    {
        return view('admin.msgs.show', compact('msg'));
    }


    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {}


    public function destroy(messages $msg)
    {
        $msg->delete();
        return redirect()->route('admin.messages.index');
    }

    public function multi_del(Request $request)
    {
        $nums = array_map('intval', explode(',', request('msgdel')));
        for ($i = 0; $i < count($nums); ++$i) {
            $msg = messages::find($nums[$i]);
            $msg->delete();
        }
        return redirect()->route('admin.messages.index');
    }
}
