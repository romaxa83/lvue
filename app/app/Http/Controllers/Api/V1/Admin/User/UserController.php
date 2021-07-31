<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\User as UserRequest;
use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Resources\User\UserResource;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class UserController extends ApiController
{
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository
    )
    {}

    public function list(Request $request)
    {
        try {
            $models = $this->userRepository->getAllPaginator($request->all(), ['role.permissions']);

            return UserResource::collection($models);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function one(User $user)
    {
        try {

            return UserResource::make($user);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function create(UserRequest\Create $request)
    {
        try {
            $model = $this->userService->create($request->all());

            return UserResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function edit(UserRequest\Update $request, User $user)
    {
        try {

            $model = $this->userService->edit($request->all(), $user);

            return UserResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function delete(Request $request, User $user)
    {
        try {
            $user->forceDelete();

            return $this->successJsonMessage([]);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
