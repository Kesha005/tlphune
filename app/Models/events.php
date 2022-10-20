<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $fillable=['user_id',
    'category_id','name','image','image1','mark_id',
    'price','about','status'];

   
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class,'id');
    }

    public function category()
    {
        return $this->belongsTo(category::class,'id',);
    }

    public function mark()
    {
        return $this->belongsTo(marks::class,'id');
    }

    public function model()
    {
        return $this->belongsTo(models::class,'id');
    }


}

