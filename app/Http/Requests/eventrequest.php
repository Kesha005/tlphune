<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class eventrequest extends FormRequest
{
  
    public function authorize()
    {
        return false;
    }

   public function attributes()
   {
    return [
        'user_id'=>'Ulanyjy',
        'category_id'=>'Kategoriýa',
        'mark_id'=>'Marka',
        'name'=>'Ady',
        'image'=>'Surat',
        'image1'=>'Surat',
        'price'=>'Bahasy',
        'about'=>'Barada'
    ];
   }

   public function messages()
   {
    return [
        'user_id.required'=>'Ulanyjy hakda maglumat ýok',
        'category_id.required'=>'Kategoriýa hakda maglumat ýok',
        'mark_id.required'=>'Marka ýok',
        'name.required'=>'Ady ýok',
        'image.required'=>'Surat ýok',
        'image.max'=>'Surat has uly',
        'image.mimes'=>'Bu faýl kabul edilmeýär',
        'image1.max'=>'Surat uly göwrümde',
        'image1.mimes'=>'Bu faýl kabul edilmeýär',
        'price.required'=>'Baha girizilmedik',
        'price.numeric'=>'Baha ýalňyş girizilen',
        'about.required'=>'Maglumat ýok'
    ];
   }


    public function rules()
    {
        return [
            'user_id'=>'required',
            'category_id'=>'required',
            'mark_id'=>'required',
            'name'=>'required',
            'image'=>'required|max:10000|mimes:jpeg,jpg,png',
            'image1'=>'max:10000|mimes:jpeg,jpg,png',
            'price'=>'required|numeric',
            'about'=>'required'
        ];
    }
}
