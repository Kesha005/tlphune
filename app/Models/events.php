<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    protected $fillable=['user_id',
    'category_id','name','image','image1','image2','mark','model',
<<<<<<< HEAD
'price','condition','about'];

   
=======
    'price','condition','about'];

   
    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }

    public function category()
    {
        return $this->belongsTo(category::class,'id','category_id');
    }


>>>>>>> 02b28f734262bd6a8b3bb36e78637e46286cb410
}

