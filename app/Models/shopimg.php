<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shopimg extends Model
{
    use HasFactory;

    protected $fillable=['shop_id','image'];

    public function shop()
    {
        return $this->belongsTo(shops::class,'shop_id');
    }
}
