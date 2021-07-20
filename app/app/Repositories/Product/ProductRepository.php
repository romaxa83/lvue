<?php

namespace App\Repositories\Product;

use App\Models\Product\Product;
use App\Repositories\AbstractRepository;

class ProductRepository extends AbstractRepository
{
    protected function modelClass(): string
    {
        return Product::class;
    }
}
