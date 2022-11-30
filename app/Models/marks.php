<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marks extends Model
{
    use HasFactory;
    protected $fillable=['name','image'];

    public function events()
    {
        return $this->hasMany(events::class,'mark_id');
    }

    public function product()
    {
        return $this->hasMany(products::class,'mark_id');
    }
}
