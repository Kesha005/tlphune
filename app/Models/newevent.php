<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class newevent extends Model
{
    use HasFactory;

    protected $fillable=['user_id','place','price','products_id'];

    public function product()
    {
        return $this->belongsTo(products::class,'products_id');
    }
}
