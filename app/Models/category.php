<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['tm','image','en','ru'];

    public function cat_event()
    {
        return $this->hasMany(events::class);
    }


    public function products()
    {
        return $this->hasMany(products::class);
    }

  
}
