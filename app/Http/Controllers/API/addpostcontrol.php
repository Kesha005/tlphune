<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Models\events;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\Auth;

class addpostcontrol extends Controller
{


    public function add_event(eventrequest $request)
    {
        $validated = $request->all();

        $request['image1'] != null ? $this->storemultiimage($validated, $request) : $this->storesingleimage($validated, $request);
        return response()->json([
            'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);
    }


    public function storemultiimage($validated, $request)
    {
        $images=[];
        if($request->image)
        {
            foreach($request->image as $img)
            {
                $img_name=time().rand(1,99).'.'.$img->extension();
                $img->storeAs("public/users/$request->user_id/events",$img_name);
                $images[]=$img_name;
            }
            $validated['image']=$images;
        }
        $this->store($validated);
    }

   

    public function store($validated)
    {
        events::create($validated);
    }

    // public function imagewatermark($validated)
    // {
       
    //     $imgFile= Image::make(storage_path("/app/public/$validated->image"));
    //     $imgFile->text('Telfun.ltd', 50, 50, function ($font) {
    //         $font->size(60);
    //         $font->color('#FF0000');
    //         $font->align('center');
    //         $font->align('bottom');
    //     });
    // }
}
