<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Api\ApiController;
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
            $models = $this->userRepository->getAll();

            return UserResource::collection($models);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
