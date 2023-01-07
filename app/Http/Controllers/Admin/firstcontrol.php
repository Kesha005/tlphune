<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\events;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class firstcontrol extends Controller
{
    public function index()
    {
        $users=count(User::where('role','user')->get());
        $events=count(events::all());
        return view('admin.index',compact('users','events'));
    }

}
