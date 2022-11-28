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
            'ru'=>'rus dili',
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
            'ru.required'=>'Maglumat girizilmedik',
        ];
    }

  
    public function rules()
    {
        return [
            'name'=>'required',
            'image' => 'required',
            'image.*' => 'max:10000|mimes:jpeg,jpg,png',
            'country'=>'required',
            'mark_id'=>'required',
            'category_id'=>'required',
            'about'=>'required',
            'en'=>'required',
            'ru'=>'required',
            'color' => 'required',
            'color.*' => 'max:10000',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
