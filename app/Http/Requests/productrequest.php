<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class productrequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name'=>'Ady',
            'image'=>'Surat',
            'mark_id'=>'Marka',
            'country'=>'Ýurt',
            'about'=>'Barada',
            'category_id'=>'Bölüm',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Harydyň ady ýok',
            'image.required'=>'Surat ýok',
            'image.max'=>'Surat uly',
            'image.mimes'=>'Faýl kabul edilmeýär',
            'country.required'=>'',
            'mark_id.required'=>'Marka girizilmedik',
            'category_id.required'=>'Bölüm girizilmedik',
            'about.required'=>'Maglumat girizilmedik',
        ];
    }

  
    public function rules()
    {
        return [
            'name'=>'required',
            'image'=>'required|max:10000|mimes:jpg,jpeg,png',
            'country'=>'required',
            'mark_id'=>'required',
            'category_id'=>'required',
            'about'=>'required',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
