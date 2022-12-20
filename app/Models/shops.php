<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shops extends Model
{
    protected $fillable=['name','image','user_id','place','phone','status'];

    public function user()
    {
        return $this->belongsTo(User::class,'id');
    }

    public function events()
    {
        return $this->hasMany(events::class,'shopid');
    }

    public function image()
    {
        return $this->hasMany(shopimg::class,'shop_id');
    }
    
}
