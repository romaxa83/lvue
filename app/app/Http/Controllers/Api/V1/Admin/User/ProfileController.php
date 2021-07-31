<?php

namespace App\Http\Controllers\Api\V1\Admin\User;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\User as UserRequest;
use App\Repositories\User\UserRepository;
use App\Resources\User\UserResource;
use App\Services\User\UserService;

class ProfileController extends ApiController
{
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository
    )
    {}

    public function edit(UserRequest\ProfileEdit $request)
    {
        $user = \Auth::user();
        try {

            $model = $this->userService->editProfile($request->all(), $user);

            return UserResource::make($model);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}

