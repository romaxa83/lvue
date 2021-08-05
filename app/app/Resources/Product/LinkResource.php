<?php

namespace App\Resources\Product;

use App\Models\Product\Link;
use App\Resources\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Link $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'code' => $model->code,
            'user' => UserResource::make($model->user),
            'products' => ProductResource::collection($model->products)
        ];
    }
}
