<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class firstcontrol extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function categories()
    {
        return view('admin.category.index');
    }
    
    public function users()
    {
        return view('admin.users.index');
    }

    public function banuser()
    {
        return view('admin.banuser');
    }

    public function shops()
    {
        return view('admin.shops');
    }

    public function marks()
    {
        return view('admin.marks');
    }

    public function events()
    {
        return view('admin.events');
    }

    public function messages()
    {
        return view('admin.messages');
    }
}
