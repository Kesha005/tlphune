<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\apk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class apkcontrol extends Controller
{
    public function index()
    {
        $apks = apk::all();
        return view('admin.apk.index', compact('apks'));
    }

    public function create(Request $request)
    {
        $validated = $request->validate(['version' => 'required', 'apk' => 'required']);
        $validated['apk'] = $request->apk->store('apk', 'public');
        apk::create($validated);
        return redirect()->route('admin.apk.index');
    }

    public function destroy(apk $apk)
    {

        $id = $apk->id;
        $apk_file = apk::find($apk)->pluck('apk');
        foreach ($apk_file as $file) {
            File::delete('storage/' . $file);
        }
        $apk->delete();
        return redirect()->route('admin.apk.index');
    }

    public function download($apk)
    {
        $file = apk::find($apk);
        return response()->file(storage_path('app/public/' . $file->apk),[
            'Content-Type'=>'application/vnd.android.package-archive',
            'Content-Disposition'=> 'attachment; filename="android.apk"',
        ]) ;
    }
}
