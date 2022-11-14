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
        return $this->belongsTo(category::class,'category_id');
    }

    public function mark()
    {
        return $this->belongsTo(marks::class,'mark_id');
    }

    public function image()
    {
        return $this->hasMany(product_img::class,'product_id');
    }

    public function color()
    {
        return $this->belongsToMany(colormodel::class,'product_colors','product_id','color_id');
    }

    public function newevent()
    {
        return $this->hasMany(newevent::class,'products_id');
    }
}
