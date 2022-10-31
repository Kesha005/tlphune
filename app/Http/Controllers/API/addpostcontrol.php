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

      return $this->storemultiimage($validated, $request);
        // return response()->json([
        //     'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        // ]);
    }


    public function storemultiimage($validated, $request)
    {
        //  $img = [];

        // if($request->image)
        // {
        //     foreach($request->image as $img)
        //     {
        //         $img[] =$request->img->store("users/$request->user_id/events",'public');
        //     }
        //     $validated['image']=$images;
        // }
        // $validated['image'] = $img;

        
        

         response()->json($names);
     
        
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
