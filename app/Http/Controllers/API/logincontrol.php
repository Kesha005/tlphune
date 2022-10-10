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

    public function error()
    {
        return response()->json(['message'=>'Siz  düzgünleri bozanlygyňyz üçin çäklendirildiňiz']);
    }

    public function register(Request $request)
    {
        try {
            //Validated
            $validateUser = Validator::make($request->all(), 
            [
               'name'=>'required|unique',
               'email'=>'required|unique',
               'password'=>'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Nädogry maglumatlar girizildi',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
               $request->all()
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

 
    public function login(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'name'=>'required|unique',
               'email'=>'required|unique',
               'password'=>'required',
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'Nädogry maglumatlar girizildi',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['name','email','password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Nädogry maglumatlar girizildi',
                ], 401);
            }
            if($request->name!=null) $user=User::where('name',$request->name);
            $user = User::where('email', $request->email)->first();

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
