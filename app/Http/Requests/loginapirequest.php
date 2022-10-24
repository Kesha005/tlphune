<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class loginapirequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'phone' => 'Telefon belgisi',
            'password' => 'parol'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Telefon nomeri boş',
            'password.required' => 'Açar sözi gerekli',
            'password.min' => 'Açar sözi azyndan 6 belgili bolmaly',
        ];
    }

    public function rules()
    {
        return [
            'phone' => 'required',
            'password' => 'required|min:6',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
