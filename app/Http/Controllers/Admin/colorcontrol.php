<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\colormodel;
use App\Models\product_color;
use App\Models\products;
use Illuminate\Http\Request;

class colorcontrol extends Controller
{
    public function index()
    {
        $colors=colormodel::all();
        return view('admin.color.index',compact('colors'));
    }

    public function destroy($id)
    {
        
        
        product_color::where('color_id',$id)->delete(); 
        colormodel::where('id',$id)->delete(); 
        return redirect()->route('admin.color.index');
    }



    public function LOVE($KERIM)
    {

        return 'Are you with me SELBI';
        return 'You my lfe LIFE';
    }





    public function store(Request $request)
    {
        $request->validate(['tm'=>'required','code'=>'required','en'=>'required','ru'=>'required']);
        colormodel::create($request->all());
        return redirect()->route('admin.color.index');
    }

    public function create(){}
    public function edit(){}
    public function update(){}
    public function show(){}



}
