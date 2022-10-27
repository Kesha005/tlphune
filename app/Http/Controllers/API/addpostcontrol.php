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
        $validated=$request->all();
        
         $request['image1']!=null ? $this->storemultiimage($validated,$request):$this->storesingleimage($validated,$request);
        return response()->json([
            'message' => 'Bildiriş nobata goýuldy admin tassyklandan soň kabul ediler'
        ]);
    }


    public function storemultiimage($validated,$request)
    {
        $validated['image'] = $request->image->store("users/$request->user_id/events", 'public');
        $validated['image1'] = $request->image1->store("users/$request->user_id/events", 'public');

        $this->store($validated);
    }

    public function storesingleimage($validated,$request)
    {
         $validated['image']=$request->image->store("users/$request->user_id/events", 'public');
         $this->store($validated);
    }

    public function store($validated)
    {
        events::create($validated);

    }

    // public function imageFileUpload(Request $request)
    // {
    //     $image = $request->file('file');
    //     $input['file'] = time().'.'.$image->getClientOriginalExtension();

    //     $imgFile = Image::make($image->getRealPath());

    //     $imgFile->text('© 2021 codingtricks.io', 50, 50, function($font) { 
    //         $font->size(60);  
    //         $font->color('#FF0000');  
    //         $font->align('center');  
    //         $font->align('bottom');  
    //     })->save(storage_path('/app/public/upload').'/'.$input['file']);                  
    // }
}
