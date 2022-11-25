<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class welayat extends Model
{
    use HasFactory;

    protected $fillable=['name'];

    public function etrap()
    {
        return $this->hasMany(etrap::class,'welayat_id');
    }


}
