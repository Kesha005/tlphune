<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\marks;
use App\Models\category;
use Illuminate\Support\Facades\File;
use App\Models\events;

class categories extends Controller
{
  public function index()
  {
    $categories = category::all();
    return view('admin.category.index', compact('categories'));
  }

  public function store(Request $request)
  {
    $validateddata = $request->validate(['tm' => 'required', 'image' => 'required','en'=>'required','ru'=>'required']);
    $validateddata['image'] = $request->image->store('files', 'public');
    category::create($validateddata);
    return redirect()->route('admin.categories.index');
  }

  public function edit(category $category)
  {
    return view('admin.category.edit', compact('category'));
  }

  public function update(Request $request, category $category)
  {

    if ($request['image'] != null) {
      $validateddata = $request->validate(['tm' => 'required', 'image' => 'required','en'=>'required','ru'=>'required']);
      $validateddata['image'] = $request->image->store('files', 'public');
      $category->update($validateddata);
      return redirect()->route('admin.categories.index');
    }
    return $this->update_nonimage($request, $category);
  }

  public function update_nonimage($request, $category)
  {
    $category->update(['tm' => $request->tm, 'image' => $category->image]);
    return redirect()->route('admin.categories.index');
  }

  public function show()
  {
  }

  public function destroy(category $category)
  {
    $id = $category->id;
    $img = category::find($category)->pluck('image');
    foreach ($img as $i) {
      File::delete('storage/' . $i);
    }
    $category->delete();
    return $this->destroy_events($id);
  }

  public function destroy_events($id)
  {
    $events = events::where('category_id', $id)->get();
    if ($events != null) {
      for ($i = 0; $i < count($events); ++$i) {
        $events[$i]->delete();
      }
      return redirect()->route('admin.categories.index');
    }
    return redirect()->route('admin.categories.index');
  }
}
