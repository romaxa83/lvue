<?php

namespace App\Resources\Order;

use App\Models\Order\Item;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Item $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'product_title' => $model->product_title,
            'price' => $model->price,
            'quantity' => $model->quantity
        ];
    }
}
