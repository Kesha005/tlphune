<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'user_id'=>'Eýesi'
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
            'user_id.required'=>'Dükanyň eýesi näbelli '
        ];
    }
   
    public function rules()
    {
        return [
            'name'=>'required|unique:shops,name',
            'image'=>'required|max:10000|mimes:jpeg,jpg,png',
            'place'=>'required',
            'phone'=>'required',
            'user_id'=>'required'
        ];
    }
}
