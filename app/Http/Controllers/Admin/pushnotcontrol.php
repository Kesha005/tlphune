<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\sendpushnot;
use App\Models\User;
use App\Services\FCMService;
use Illuminate\Http\Request;

class pushnotcontrol extends Controller
{
    public function index()
    {
        return view('admin.push.index');
    }

    public function send(Request $request)
    {
       $url='https://fcm.googleapis.com/fcm/send';
       $apikey='AAAAlG8TfR4:APA91bEKmtljhL-YtMX1SodOasN0kCTxe3obfrv3wdw5e0i6PZWsXHbeaGdpcJ30DS6rQtyIb1s_g-m3D7bzPhZ5PCM3NQ0JofXkKwO0qntsmMTrdc9M5I9D5vaq0PtXZB5MMKWXC-ec';
       $headers=[
           'Authorization:key='.$apikey,
           'Content-Type:application/json'
       ];
       $notifdata=[
           'name'=>$request->name,
           'text'=>$request->text
       ];

       $ch=curl_init();
       curl_setopt($ch,CURLOPT_URL,$url);
       curl_setopt($ch,CURLOPT_POST,true);
       curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
       curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode($notifdata));
       $result=curl_exec($ch);
       return $result;
       curl_close($ch);

        // return redirect()->route('admin.push.index');
    }
         
            
}
