<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class userrequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name'=>'Ulanyjy ady',
            'phone'=>'Telefon belgisi',
            'password'=>'parol'
        ];
      
    }

    public function messages()
    {
        return [
            'name.required'=>'Ulanyjy ady boş',
            'phone.required'=>'Telefon nomeri boş',
            'phone.unique'=>'Bu belgiden registrasiýa edilen',
            'password.required'=>'Açar sözi gerekli',
            'password.min'=>'Açar sözi azyndan 6 belgili bolmaly',
        ];
    }

    public function rules()
    {
        return [
            'name' => 'required',
            'phone' => 'required|unique:users,phone',
            'password' => 'required|min:6',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
