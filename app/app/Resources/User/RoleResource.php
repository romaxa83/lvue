<?php

namespace App\Resources\User;

use App\Models\User\Role;
use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var Role $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'name' => $model->name,
        ];
    }
}
