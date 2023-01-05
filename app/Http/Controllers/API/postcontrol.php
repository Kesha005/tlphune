<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\eventrequest;
use App\Http\Requests\neweventreq;
use App\Models\event_img;
use App\Models\events;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;
use Intervention\Image\Facades\Image;

class postcontrol extends Controller
{

    public function edit($id)
    {
        $product = events::find($id);
        return response()->json($product);
    }


    public function type(Request $request)
    {
        $event = events::find($request->id);
        if ($event->is_new == true) return $this->update($request, $event);
        else return $this->updatenew($request, $event);
    }

    public function updatenew(neweventreq $request, $event)
    {
        $event->update($request->all());
        return response()->json(['message' => 'Bildiriş üýtgedildi']);
    }

    public function updateold(eventrequest $request, $event)
    {
        $validated = $request->all();
        File::delete("storage/" . $event->public_image);
        $path =  $request->image[0];
        $filename = hash('sha256', $path) . "." . $path->extension();
        $image_resize = Image::make($path->getRealPath());
        $image_resize->resize(150, 150);
        $image_resize->save(storage_path("app/public/product_thumb/") . $filename);
        $validated['public_image'] = "product_thumb/$filename";
        $event->update($validated);
        $this->updateimg($request, $event);
        return response()->json(['message' => 'Bildiriş üýtgedildi']);
    }

    public function updateimg($request, $event)
    {
        $validated = $request->file('image');

        $file = new Filesystem;$file->cleanDirectory("storage/app/public/users/$event->user_id/events/$event->id");
        foreach ($validated as $img) {
            $image['event_id'] = $event->id;
            $image['image'] = $img->store("users/$event->user_id/events/$event->id", 'public');
            event_img::create($image);
        }
    }
}
