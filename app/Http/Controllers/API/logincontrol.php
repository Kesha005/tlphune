<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class logincontrol extends Controller
{
    public function isnew(Request $request)
    {
        $request->validate(['phone'=>'required']); $user=User::where('phone',$request['phone'])->get();
        if($user->count()>0) 
        {
            if($user['isban']==0) return $this->login($request);
            return $this->error();
        }
        return $this->register($request);
    }

    public function login($data)
    {
        $user = User::where('phone', $data['phone'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
        ]);
    }

    public function register($data)
    {
        $user = User::create($data->all());

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
           'access_token' => $token,
           'token_type' => 'Bearer',
        ]);
    }

    public function error()
    {
        return response()->json(['message'=>'Siz  düzgünleri bozanlygyňyz üçin çäklendirildiňiz']);
    }
}
