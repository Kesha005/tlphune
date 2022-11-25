<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class etrap extends Model
{
    use HasFactory;

    protected $fillable=['name','welayat_id'];

    public function welayat()
    {
        return $this->belongsTo(welayat::class,'welayat_id');
    }
}
