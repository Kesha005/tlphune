<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class logincontrol extends Controller
{

  

    public function register(Request $request)
    {
        try {
            $validateUser = Validator::make($request->all(), 
            [
                'name' => 'required|unique:users,name',
                'phone' => 'required|unique:users,phone',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);

            return response()->json([
                'status' => true,
                'message' => 'User Created Successfully',
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
                'name' => 'required',
                'password' => 'required'
            ]);

            if($validateUser->fails()){
                return response()->json([
                    'status' => false,
                    'message' => 'validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            if(!Auth::attempt($request->only(['name', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Name & Password does not match with our record.',
                ], 401);
            }
            
            $user = User::where('email', $request->email)->first();
            if ($user->isban==1)
            {
                return $this->error();
            }

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $user->createToken("API TOKEN")->plainTextToken
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function password_reset(Request $request)
    {
        $request->validate(['user_id'=>'required','password'=>'required|min:6']);$user=User::find($request->user_id);
        $user->update(['password'=>Hash::make($request->password)]);
        return $this->success($request->user_id);

    }

    public function success($id)
    {
        $user=User::find($id);
        return response()->json([
            'status' => true,
            'message'=>'Parol üýtgedildi',
            'token'=>$user->createToken("API TOKEN")->plainTextToken
        ]);
    }

    public function error()
    {
        return response()->json(['message'=>'Siz  düzgünleri bozanlygyňyz üçin çäklendirildiňiz']);
    }
}
