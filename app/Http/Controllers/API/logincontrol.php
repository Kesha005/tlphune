<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class logincontrol extends Controller
{
    public function isnew(Request $request)
    {
        $request->validate(['phone'=>'required']); $user=User::where('phone',$request['phone'])->get();
        if(count($user)>0) 
        {
            if($user['isban']==0) return $this->loginUser($request);
            return $this->error();
        }
        return $this->createUser($request);
    }


    public function error()
    {
        return response()->json(['message'=>'Siz  düzgünleri bozanlygyňyz üçin çäklendirildiňiz']);
    }




    public function createUser($request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
               
                'phone' => 'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Nädogry maglumatlar girizildi',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
               'phone'=>$request->phone
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Ulanyjy doredildi',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

 
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'phone'=>'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Nädogry maglumatlar girizildi',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['phone']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Nädogry maglumatlar girizildi',
                ], 401);
            }

            $user = User::where('phone', $request->email)->first();

            return response()->json([
                'status' => true,
                'message' => 'Iceri girildi.',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
