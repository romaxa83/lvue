<?php

namespace App\Resources\User;

use App\Models\User\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        /** @var User $model */
        $model = $this->resource;

        return [
            'id' => $model->id,
            'name' => $model->name,
            'email' => $model->email,
            $this->mergeWhen(\Auth::user() && !\Auth::user()->isInfluencer(), [
                'role' => RoleResource::make($model->role)
            ]),
            $this->mergeWhen(\Auth::user() && \Auth::user()->isInfluencer(), [
                'revenue' => $model->revenue
            ]),
        ];
    }
}
