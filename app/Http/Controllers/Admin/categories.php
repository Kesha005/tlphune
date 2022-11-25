<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\marks;
use App\Models\category;
use Illuminate\Support\Facades\File;
use App\Models\events;
use App\Models\newevent;
use App\Models\product_color;
use App\Models\products;
use Illuminate\Support\Facades\Storage;

class categories extends Controller
{
  public function index()
  {
    $categories = category::all();
    return view('admin.category.index', compact('categories'));
  }

  public function store(Request $request)
  {
    $validateddata = $request->validate(['tm' => 'required', 'image' => 'required', 'en' => 'required', 'ru' => 'required']);
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
      $validateddata = $request->validate(['tm' => 'required', 'image' => 'required', 'en' => 'required', 'ru' => 'required']);
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
    $this->destroy_events($id);
    foreach ($img as $i) {
      File::delete('storage/' . $i);
    }
    $category->delete();
    return redirect()->route('admin.categories.index');
    
  }

  public function destroy_events($id)
  {
    $events = events::with('user')->where('category_id', $id)->get();
    $products=products::where('category_id',$id)->get();
    count($events) > 0 ? $this->destroy_with_directory_img($events) : "";
    count($products) > 0 ? $this->destroy_products($products):"";

  }

  public function destroy_with_directory_img($events)
  {
    foreach ($events as $event) {
      Storage::deleteDirectory("public/users/$event->user->id/events/$event->id");
      File::delete("storage/" . $event->public_image);
      $event->delete();
    }
  }

  public function destroy_products($products)
  {
    foreach($products as $product)
    {
        Storage::deleteDirectory("public/products/$product->id"); File::delete("storage/".$product->public_image);
        products::where('id', $product->id)->delete();product_color::where('product_id',$product->id)->delete();
        newevent::where('products_id',$product->id)->delete();
    }
  }
}
