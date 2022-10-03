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
<<<<<<< HEAD

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
=======
    $validateddata = $request->validate(['name' => 'required', 'image' => 'required']);
    $validateddata['image'] = $request->image->store('files', 'public');
    marks::create($validateddata);
    return redirect()->route('admin.marks.index');
    
  }

  public function edit(marks $mark)
  {
    return view('admin.marks.edit',compact('mark'));
  }

  public function update(Request $request,marks $mark)
  {
   
    if ($request['image']!=null)
    { $validateddata = $request->validate(['name' => 'required', 'image' => 'required']);
      $validateddata['image'] = $request->image->store('files', 'public');
      $mark->update($validateddata);
      return redirect()->route('admin.marks.index');
    }
    return $this->update_nonimage($request,$mark);
   
  }

  public function destroy($mark)
    {
            $img = marks::find($mark)->pluck('image');
            foreach ($img as $i) {
                File::delete('storage/' . $i);
            }
            marks::destroy($mark);
        return redirect()->route('admin.marks.index');
    }


  public function update_nonimage($request,$mark)
  {
    $mark->update(['name'=>$request->name,'image'=>$mark->image]);
    return redirect()->route('admin.marks.index');
  }

>>>>>>> a28ae097858eb3651dc13d450a3cb7693ae1c766
}
