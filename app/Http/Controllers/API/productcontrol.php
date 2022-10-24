<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\cshopprequest;
use App\Http\Requests\productrequest;
use App\Models\c_shopproducts;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class productcontrol extends Controller
{
    public function create(cshopprequest $request)
    {
        if($request['image1']!=null){
           $this->storemultiimage($request);
        }
        $this->storesingleimage($request);
        
    }

    public function storemultiimage($request)
    {
        $request['image']=$request->image->store("users/$request->user_id/products",'public');
        $request['image1']=$request->image->store("users/$request->user_id/products",'public');
        return $this->store($request);
    }

    public function storesingleimage($request)
    {
        $request['image']=$request->image->store("users/$request->user_id/products",'public');return $this->store($request);
    }

    public function store($request)
    {
        c_shopproducts::create($request->all());
        return response()->json([
            'message'=>'Haryt nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);
    }

    public function destroy(Request $request)
    {
        $product=c_shopproducts::find($request->id);
        c_shopproducts::where('id',$request->id)->delete();
        return $this->destroy_image($product);
    }

    public function destroy_image($image)
    {
        $image->image1==null ? File::delete('storage/'.$image->image) :File::delete('storage/'.$image->image)&&File::delete('storage/'.$image->image1);
        return response()->json([
            'status'=>true,
            'message'=>'Haryt pozuldy'
        ]);
    }
}
