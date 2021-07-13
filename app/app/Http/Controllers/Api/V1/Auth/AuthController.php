<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Resources\User\UserResource;
use App\Services\User\UserService;
use Illuminate\Http\Request;

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
        try {
            /** @var $user User */
            $user = $this->userRepository->findOneBy('email', $request['email']);

            if(!$user || !\Hash::check($request->password, $user->password)){
                return response()->json(['error' => 'The provided credentials are incorrect.'], 401);
            }

            return response()->json(['token' => $user->createToken($user->email)->plainTextToken]);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function user(Request $request)
    {
        try {
            $user = \Auth::user();

            return response()->json([]);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
