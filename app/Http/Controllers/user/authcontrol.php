<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class authcontrol extends Controller
{
    public function login()
    {
        if (Auth::check() == true) return redirect('');
        return view('signin');
    }

    public function  post(Request $request)
    {

        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('');
        }

        return redirect()->route('signin')->withSuccess('Nädogry maglumatlar girizildi');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('');
    }
}
