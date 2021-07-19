<?php

namespace App\Resources\User;

use App\Models\User\Permission;
use Illuminate\Http\Resources\Json\JsonResource;

class PermissionResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Permission $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'name' => $model->name,
        ];
    }
}
