<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\ApiController;
use App\Models\User\Role;
use App\Repositories\User\RoleRepository;
use App\Resources\User\RoleResource;
use App\Services\User\RoleService;
use Illuminate\Http\Request;
use App\Http\Requests\Api\V1\Role as RoleRequest;

class RoleController extends ApiController
{
    public function __construct(
        protected RoleRepository $roleRepository,
        protected RoleService $roleService
    )
    {}

    public function list(Request $request)
    {
        try {
            $models = $this->roleRepository->getAll(['permissions']);

            return RoleResource::collection($models);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function one(Role $role)
    {
        try {
            return RoleResource::make($role);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function create(RoleRequest\Create $request)
    {
        try {
            $model = $this->roleService->create($request->all());

            return RoleResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function edit(RoleRequest\Update $request, Role $role)
    {
        try {
            $model = $this->roleService->edit($request->all(), $role);

            return RoleResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function delete(Request $request, Role $role)
    {
        try {
            $role->forceDelete();

            return $this->successJsonMessage([]);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

}

