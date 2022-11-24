<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopproducts extends Model
{
    use HasFactory;

    protected $fillable=['shop_id','prouct_id'];

    public function products()
    {
        return $this->belongsTo(products::class,'id');
    }

    public function c_products()
    {
        return $this->belongsTo(c_shopproducts::class,'id');
    }
    public function shop()
    {
        return $this->belongsTo(shops::class,'id');
    }

}
