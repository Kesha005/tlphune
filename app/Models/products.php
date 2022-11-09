<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable=['public_image','name','category_id','mark_id','country','about'];

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function mark()
    {
        return $this->belongsTo(marks::class);
    }

    public function image()
    {
        return $this->hasMany(product_img::class,'product_id');
    }
}
