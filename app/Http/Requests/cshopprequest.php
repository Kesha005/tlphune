<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class cshopprequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function attributes()
    {
        return [
            'name'=>'Ady',
            'image'=>'Surat',
            'price'=>'Bahasy',
            'image1'=>'Goşmaça surat',
<<<<<<< HEAD
            'mark'=>'Marka',
            'shop_id'=>'Dükan',
            'about'=>'Barada'
=======
            'mark_id'=>'Marka',
            'about'=>'Haryt barada',
            'shop_id'=>'Dükan'
>>>>>>> fb92a152244bb29604fda098bd8b574818af7ee0
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Harydyň ady ýok',
            'image.required'=>'Surat ýok',
            'image.max'=>'Surat uly',
            'image.mimes'=>'Faýl kabul edilmeýär',
            'price.required'=>'Harydyň bahasy ýok',
            'price.numeric'=>'Sifr girizilmedik',
            'image1.max'=>'Surat uly göwrümde',
            'image1.mimes'=>'Faýl kabul edilmeýär',
<<<<<<< HEAD
            'mark.required'=>'Marka girizilmedik',
            'shop_id.required'=>'Dükan girizilmedik',
            'about.required'=>'Barada meýdany boş',
=======
            'mark_id.required'=>'Marka girizilmedik',
            'about.required'=>'Maglumat girizilmedik',
            'shop_id.required'=>'Dükan girizilmedik'
>>>>>>> fb92a152244bb29604fda098bd8b574818af7ee0
        ];
    }

  
    public function rules()
    {
        return [
            'name'=>'required',
            'image'=>'required|max:10000|mimes:jpg,jpeg,png',
            'price'=>'required|numeric',
            'image1'=>'max:10000|mimes:jpg,jpeg,png',
<<<<<<< HEAD
            'mark'=>'required',
            'shop_id'=>'required',
            'about'=>'required'
=======
            'mark_id'=>'required',
            'about'=>'required',
            'shop_id'=>'required',
>>>>>>> fb92a152244bb29604fda098bd8b574818af7ee0
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
