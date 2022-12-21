<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\shopimg;
use App\Models\shopproducts;
use App\Models\shops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class shopscontrol extends Controller
{
   
    public function index()
    {
        $shops=shops::with('user')->get();

        return view('admin.shops.index',compact('shops'));
    }

    public function create()
    {}

 
   
    public function show($id)
    {
        $shop=shops::with('etrap','images','user')->where('id',$id)->first();
        return view('admin.shops.show',compact('shop'));
    }


    public function destroy($shop)
    {
        $shops=shops::find($shop);
        File::delete('storage/'.$shops->image); $shops->delete();shopimg::where('shop_id',$shop)->delete();
        Storage::deleteDirectory("public/users/$shops->user_id/shops/$shops->id");
        return redirect()->route('admin.shops.index');
    }

    public function update($id)
    {
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

    public function check(Request $request)
    {
        shops::where('id', $request->id)->update(['status' => 1]);
        if($request->ajax=='true')return response()->json(['dataId'=>$request->id]); 
        return redirect()->route('admin.shops.index');
    }
}
