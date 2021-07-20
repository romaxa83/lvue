<?php

namespace App\Resources\Product;

use App\Models\Product\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Product $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'title' => $model->title,
            'description' => $model->description,
            'price' => $model->price,
        ];
    }
}

