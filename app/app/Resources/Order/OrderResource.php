<?php

namespace App\Resources\Order;

use App\Models\Order\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Order $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            'total' => $model->total,
            'items' => OrderItemResource::collection($model->items)
        ];
    }
}
