<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable=['name','image','price','image1','mark','model','status','about'];
=======
    protected $fillable=['name','image','price','image1','mark_id','about'];
>>>>>>> fb92a152244bb29604fda098bd8b574818af7ee0
}
