<?php

namespace App\Repositories\Order;

use App\Models\order\Order;
use App\Repositories\AbstractRepository;

class OrderRepository extends AbstractRepository
{
    protected function modelClass(): string
    {
        return Order::class;
    }
}
