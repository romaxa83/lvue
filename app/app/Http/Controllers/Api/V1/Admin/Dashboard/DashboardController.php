<?php

namespace App\Http\Controllers\Api\V1\Admin\Dashboard;

use App\Http\Controllers\Api\ApiController;
use App\Models\Order\Order;
use App\Resources\Dashboard\ChartResource;

class DashboardController extends ApiController
{
    public function __construct()
    {}

    public function chart()
    {
        $orders = Order::query()
            ->join('order_items', 'orders.id' ,'=', 'order_items.order_id')
            ->selectRaw("DATE_FORMAT(orders.created_at, '%Y-%m-%d') as date, sum(order_items.quantity*order_items.price) as sum")
            ->groupBy('date')
            ->get();

        return ChartResource::collection($orders);
    }
}

