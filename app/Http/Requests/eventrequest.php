<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class eventrequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function attributes()
    {
        return [
            'user_id' => 'Ulanyjy',
            'category_id' => 'Kategoriýa',
            'mark_id' => 'Marka',
            'name' => 'Ady',
            'image' => 'Surat',
            'image1' => 'Surat',
            'price' => 'Bahasy',
            'about' => 'Barada',
            'place'=>'Welayat'
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Ulanyjy hakda maglumat ýok',
            'category_id.required' => 'Kategoriýa hakda maglumat ýok',
            'mark_id.required' => 'Marka ýok',
            'name.required' => 'Ady ýok',
            'image.required' => 'Surat ýok',
            'image.max' => 'Surat has uly',
            'image.mimes' => 'Bu faýl kabul edilmeýär',
            'image1.max' => 'Surat uly göwrümde',
            'image1.mimes' => 'Bu faýl kabul edilmeýär',
            'price.required' => 'Baha girizilmedik',
            'price.numeric' => 'Baha ýalňyş girizilen',
            'about.required' => 'Maglumat ýok',
            'place.required'=>'Welayat yok'
        ];
    }


    public function rules()
    {
        return [
            'user_id' => 'required',
            'category_id' => 'required',
            'mark_id' => 'required',
            'name' => 'required',
            'image' => 'required|max:10000|mimes:jpeg,jpg,png',
            'image1' => 'max:10000|mimes:jpeg,jpg,png',
            'price' => 'required|numeric',
            'about' => 'required',
            'place'=>'required'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
