<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\loginapirequest;
use App\Http\Requests\userrequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class logincontrol extends Controller
{

    public function control(userrequest $request)
    {
        return response()->json(['status'=>true]);
    }

    public function register(userrequest $request)
    {
        try {

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password)
            ]);
            Storage::disk('local')->makeDirectory("public/users/$user->id/events");
            Storage::disk('local')->makeDirectory("public/users/$user->id/shops");
            Storage::disk('local')->makeDirectory("public/users/$user->id/products");

            return response()->json([
                'status' => true,
                'message' => 'Registrasiýa edildi',
                'access_token' => $user->createToken("API TOKEN")->plainTextToken,
                'user'=>$user
                
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function login(loginapirequest $request)
    {
        try {

            if(!Auth::attempt($request->only(['phone', 'password']))){
                return response()->json([
                    'status' => false,
                    'message' => 'Ulanyjy belgisi ýa-da açar sözi nädogry',
                ], 401);
            }
            
            $user = User::where('phone', $request->phone)->first();
            if ($user->isban==1)
            {
                return $this->error();
            }

            return response()->json([
                'status' => true,
                'message' => 'Içeri girildi',
                'access_token' => $user->createToken("API TOKEN")->plainTextToken,
                'user'=>$user
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
            'access_token'=>$user->createToken("API TOKEN")->plainTextToken,
            'user'=>$user
        ]);
    }

    public function error()
    {
        return response()->json(['message'=>'Siz  düzgünleri bozanlygyňyz üçin çäklendirildiňiz']);
    }

    public function me(Request $request)
    {
        return $request->user();
    }

    public function logout(Request $request)
    {
        $user=request()->user();$user->tokens()->where('id',$user->currentAccessToken()->id)->delete();
        return response()->json([
            'message'=>'Siz ulgamdan çykdyňyz'
        ]);
    }

  
}
