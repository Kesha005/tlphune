<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class c_shopproducts extends Model
{
    use HasFactory;

    protected $fillable=['shop_id','name','image','image1','mark','model','about'];


    
}
