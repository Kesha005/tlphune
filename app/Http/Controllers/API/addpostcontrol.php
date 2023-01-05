<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Http\Requests\neweventreq;
use App\Models\event_img;
use App\Models\events;
use App\Models\User;
use App\Models\products;
use App\Models\welayat;
use Illuminate\Support\Facades\Storage;

use Intervention\Image\Facades\Image;

class addpostcontrol extends Controller
{


    public function add_event(eventrequest $request)
    {

        $data = $request->only('user_id', 'category_id', 'name', 'mark_id', 'place', 'price', 'about','shopid','color_id');
        $path =  $request->image[0];$filename  = hash('sha256', $path);$image_resize = Image::make($path->getRealPath());
        $image_resize->resize(150, 150);  $image_resize->save(storage_path("/app/public/users/$request->user_id/") . $filename);
        $data['public_image']="/users/$request->user_id/$filename";$data['is_new']=false;
        $event = events::create($data); $this->storeimage($request, $event);
        $this->user_limit_minus($request->user_id);
        return response()->json([
            'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);

       
    }



    public function storeimage($request, $event)
    {
        $validated = $request->file('image');

        Storage::disk('local')->makeDirectory("public/users/$event->user_id/events/$event->id");
        foreach ($validated as $img) {
            $image['event_id'] = $event->id;
            $image['image'] = $img->store("users/$event->user_id/events/$event->id", 'public');
            event_img::create($image);
        }
    }



    public function newevent(neweventreq $request)
    {
        $product=products::find($request->products_id);
        $data=$request->all();$data['color_id']=$request->color_id;$data['status']=1;$data['name']=$product->name;$data['public_image']=$product->public_image;$data['is_new']=true;
        $data['about']=$product->about;$data['mark_id']=$product->mark_id;$data['category_id']=$product->category_id;
        events::create($data);
        $this->user_limit_minus($request->user_id);
        return response()->json(['message'=>'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler']);
    }

    public function place()
    {
        $welayats=welayat::with('etrap')->get();
        return response()->json($welayats);
    }

    public function user_limit_minus($id)
    {
        $user=User::find($id);$limit=$user->eventlimit-1;  
        $user->update(['eventlimit'=>$limit]);  
    }
}
