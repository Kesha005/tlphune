<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marks extends Model
{
    use HasFactory;
    protected $fillable=['name','image'];

    public function mark_event()
    {
        return $this->hasMany(events::class,'mark_id','id');
    }

    public function product()
    {
        return $this->hasMany(products::class,'mark_id');
    }
}
