<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'description',
        'slug',
        'img',
    ];

    function products(){
        return $this->hasMany('App\Product');
    }
}
