<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class colormodel extends Model
{
    use HasFactory;

    protected $fillable=['name','code'];

    public function product()
    {
        return $this->belongsToMany(products::class,'colormodels','product_id','color_id');
    }
}
