<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create($attributes)
    {
        $this->product->create($attributes);
    }

    public function update($attributes)
    {
        
        $this->product->update($attributes);
    }
}