<?php

namespace App\Repositories\Product;

use App\Models\Product\Link;
use App\Repositories\AbstractRepository;

class LinkRepository extends AbstractRepository
{
    protected function modelClass(): string
    {
        return Link::class;
    }
}
