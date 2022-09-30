<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\marks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class markcontrol extends Controller
{

  public function index()
  {
    $marks = marks::all();
    return view('admin.marks.index', compact('marks'));
  }

  public function store(Request $request)
  {

  }

  public function edit($id)
  {

  }

  public function update($id)
  {

  }




    public function delete($id)
    {
        if ($id) {
            $img = marks::find($id)->pluck('image');
            foreach ($img as $i) {
                File::delete('storage/' . $i);
            }
            marks::destroy($id);
        }
    }
}
