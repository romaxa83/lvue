<?php

namespace App\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollections extends ResourceCollection
{
    public function toArray($request): array
    {
        return [
            'data' => $this->collection->get(),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}

