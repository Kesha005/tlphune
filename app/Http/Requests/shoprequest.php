<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class shoprequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function attributes()
    {
        return [
            'name'=>'Dükanyň ady',
            'image'=>'Suraty',
            'place'=>'Ýeri',
            'phone'=>'Teleon nomeri',
            'user_id'=>'Eýesi',
            'about'=>'Barada'
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Dükanyň ady boş bolmaly däl',
            'name.unique'=>'Bu at bilen başga dükan registrasiýa edilen',
            'image.required'=>'Surat gerek',
            'image.max'=>'Bu faýl uly',
            'image.mimes'=>'Faýl surat däl',
            'place.required'=>'Ýerleşýän ýeri girizilmedik',
            'phone.required'=>'Telefon nomeri girizilmedik',
            'user_id.required'=>'Dükanyň eýesi näbelli ',
            'about.max'=>'Has uly format',
            'about.required'=>'Maglumat yok'
        ];
    }
   
    public function rules()
    {
        return [
            'name'=>'required|unique:shops,name',
            'image' => 'required',
            'image.*' => 'max:10000|mimes:jpeg,jpg,png,webp',
            'place'=>'required',
            'phone'=>'required',
            'user_id'=>'required',
            'about'=>'required|max:10000',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }
}
