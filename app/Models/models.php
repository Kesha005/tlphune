<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;

    protected $fillable=['mark_id','name','ram','cpu','battery','height','width','year'];
}
