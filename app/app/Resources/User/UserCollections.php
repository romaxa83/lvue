<?php

namespace App\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollections extends ResourceCollection
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
