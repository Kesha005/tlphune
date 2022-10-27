<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shopproducts;
use App\Models\shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class shopscontrol extends Controller
{
   
    public function index()
    {
        $shops=shops::with('user')->paginate(20);
        return view('admin.shops.index',compact('shops'));
    }

    public function create()
    {}

 
   
    public function show($shop)
    {
        return view('admin.shops.show',compact('shop'));
    }


    public function destroy($shop)
    {
        File::delete('storage/'.$shop->image); $shop->delete();
        return redirect()->route('admin.shops.index');
    }

    public function update(shops $shop)
    {
        $shop->update(['status'=>1]);
        return redirect()->route('admin.shops.index');
    }

    public function multi_destroy(Request $request)
    {
        $nums = array_map('intval', explode(',', request('delete_shop')));
        for ($i = 0; $i < count($nums); ++$i) {
            $shop = shops::find($nums[$i]);File::delete('storage/'.$shop->image);
            $shop->delete();
        }
        return redirect()->route('admin.shops.index');
    }


    public function multi_confirm(Request $request)
    {
        $nums = array_map('intval', explode(',', request('confirm_shop')));
        for ($i = 0; $i < count($nums); ++$i) {
            $shop = shops::find($nums[$i]);
            $shop->update(['status'=>1]);
        }
        return redirect()->route('admin.shops.index');
    }
}
