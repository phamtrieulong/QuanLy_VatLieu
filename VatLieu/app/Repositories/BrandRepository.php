<?php

namespace App\Repositories;

use App\Models\Brand;

class BrandRepository
{
    protected $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function create($attributes)
    {
        $this->brand->create($attributes);
    }

    public function update($attributes)
    {
        $this->brand->update($attributes);
    }
}