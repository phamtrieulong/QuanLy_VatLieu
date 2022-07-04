<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'price',
        'selling_price',
        'image',
        'trending',
        'quantity',
        'description',
        'status',
        'brand_id',
        'category_id'
    ];

    function brand(){
        return $this->belongsTo(Brand::class);
    }
    function category(){
        return $this->belongsTo(Category::class);
    }



}
