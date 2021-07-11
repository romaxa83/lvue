<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Repositories\User\UserRepository;
use App\Resources\User\UserResource;
use App\Services\User\UserService;

class AuthController extends ApiController
{
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository
    )
    {}

    public function register(RegisterRequest $request)
    {
        try {
            $model = $this->userService->create($request->all());

            return UserResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function login(LoginRequest $request)
    {
        dd($request);
        try {

            $user = $this->userRepository->findOneBy('email', $request['email']);

            dd($user);

            $model = $this->userService->create($request->all());

            return UserResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
