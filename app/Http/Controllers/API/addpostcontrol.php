<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class addpostcontrol extends Controller
{
<<<<<<< HEAD
    public function add_event()
    {
        
=======
    public function add_event(Request $request)
    {
        $request->validate([]);
>>>>>>> 02b28f734262bd6a8b3bb36e78637e46286cb410
    }
}
