<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\ApiController;
use App\Repositories\User\PermissionRepository;
use App\Resources\User\PermissionResource;
use Illuminate\Http\Request;

class PermissionController extends ApiController
{
    public function __construct(
        protected PermissionRepository $repository,
    )
    {}

    public function list(Request $request)
    {
        try {
            $models = $this->repository->getAll();

            return PermissionResource::collection($models);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}


