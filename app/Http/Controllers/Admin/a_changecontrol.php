<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class a_changecontrol extends Controller
{
    public function index()
    {
        $user=User::find(Auth::user()->id);
        return view('admin.profil.index',compact('user'));
    }

    public function change_profil(Request $request, User $user)
    {
        $request->validate(['name'=>'required','email'=>'required']);
        $user->update($request->all());
        return back()->with('status','Profil üýtgedildi');
    }

    public function change_password(Request $request ,User $user)
    {
        $request->validate(['password'=>'required','newpassword'=>'required']);
        if(!Hash::check($request->password,Auth::user()->password)){
            return back('error','Açar sözi nädogry');
        }
        User::whereId(Auth::user()->id)->update(['password'=>Hash::make($request->newpassword)]);
        return back()->with('status','Açar sözi üýtgedildi');
    }
}
