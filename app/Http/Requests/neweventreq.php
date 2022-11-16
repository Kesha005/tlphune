<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;


class neweventreq extends FormRequest
{
    public function authorize()
    {
        return true;
    }

   
    public function attributes()
    {
        return [
            'user_id' => 'Ulanyjy',
            'price' => 'Bahasy',
            'place' => 'Welayat',
            'products_id'=>'haryt',
            'color_id'=>'Renk'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Ulanyjy hakda maglumat ýok',
            'products_id.required'=>'Haryt yok',
            'price.required' => 'Baha girizilmedik',
            'price.numeric' => 'Baha ýalňyş girizilen',
            'place.required' => 'Welayat yok',
            'color_id.required'=>'Renk yok'
        ];
    }


    public function rules()
    {
        return [
            'user_id' => 'required',
            'products_id'=>'required',
            'price' => 'required|numeric',
            'place' => 'required',
            'color_id'=>'required'
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
