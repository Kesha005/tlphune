<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=['name','image'];

    public function user()
    {
<<<<<<< HEAD
        return $this->belongsToMany(User::class,'events');
=======
        return $this->hasMany(events::class);
>>>>>>> 02b28f734262bd6a8b3bb36e78637e46286cb410
    }
}
