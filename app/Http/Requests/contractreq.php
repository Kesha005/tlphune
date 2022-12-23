<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class contractreq extends FormRequest
{
  
    public function authorize()
    {
        return true;
    }

   

    public function attributes()
    {
        return [
            'name'=>'Ady',
            'text'=>'Mazmuny'
            
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'Harydyň ady ýok',
            'text.required'=>'Mazmuny yok'
           
        ];
    }

  
    public function rules()
    {
        return [
            'name'=>'required',
            'text'=>'required',
        ];
    }
}
