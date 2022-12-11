<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'name',
        'mark_id',
        'place',
        'price',
        'about',
        'status',
        'public_image',
        'color_id',
        'products_id',
        'is_new',
        'view',
        'shopid'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

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
        return $this->hasMany(event_img::class, 'event_id');
    }

    public function color()
    {
        return $this->belongsTo(colormodel::class,'color_id');
    }

    public function etrap()
    {
        return $this->belongsTo(etrap::class,'place');
    }
    public function product()
    {
        return $this->belongsTo(products::class,'products_id');
    }

    public function shop()
    {
        return $this->belongsTo(shops::class,'shopid');
    }


}
