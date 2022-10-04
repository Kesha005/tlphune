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
        return $this->belongsToMany(User::class,'events');
    }
}
