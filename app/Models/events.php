<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;
    
    protected $fillable=[
    'user_id',
    'category_id',
    'name',
    'image',
    'image1',
    'mark_id',
    'place',
    'price',
    'about',
    'status'];

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function mark()
    {
        return $this->belongsTo(marks::class);
    }

<<<<<<< HEAD
=======
    public function model()
    {
        return $this->belongsTo(models::class);
    }

>>>>>>> fb92a152244bb29604fda098bd8b574818af7ee0

}

