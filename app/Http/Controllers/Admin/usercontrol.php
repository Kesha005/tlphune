<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class usercontrol extends Controller
{
   
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));
    }

    public function banuser()
    {
        $users=User::where('isban',1)->get();
        return view('admin.banuser.index',compact('users'));
    }

    public function ban($user)
    {
        $data=['isban'=>1];
        $user->update($data);
        return redirect()->route('admin.users.index');
    }

    public function delban($user)
    {
        $data=['isban'=>0];
        $user->update($data);

        return redirect()->route('admin.users.banuser');
    }

   
}
