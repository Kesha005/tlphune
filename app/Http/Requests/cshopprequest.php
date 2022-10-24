<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'mark'=>'Marka',
            'shop_id'=>'Dükan',
            'about'=>'Barada'
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
            'mark.required'=>'Marka girizilmedik',
            'shop_id.required'=>'Dükan girizilmedik',
            'about.required'=>'Barada meýdany boş',
        ];
    }

  
    public function rules()
    {
        return [
            'name'=>'required',
            'image'=>'required|max:10000|mimes:jpg,jpeg,png',
            'price'=>'required|numeric',
            'image1'=>'max:10000|mimes:jpg,jpeg,png',
            'mark'=>'required',
            'shop_id'=>'required',
            'about'=>'required'
        ];
    }
}
