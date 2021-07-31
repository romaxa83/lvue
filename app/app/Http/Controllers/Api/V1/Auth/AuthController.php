<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;
use App\Models\User\User;
use App\Repositories\User\UserRepository;
use App\Resources\User\UserResource;
use App\Services\Auth\UserPassportService;
use App\Services\User\UserService;
use Illuminate\Http\Request;

class AuthController extends ApiController
{
    public function __construct(
        protected UserService $userService,
        protected UserRepository $userRepository,
        protected UserPassportService $passportService
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

            $tokens = $this->passportService->auth($user->id, $request->password);

            \Auth::login($user);

            return $this->successJsonMessage($tokens);

            // авторизация через cookie
//            $token = $tokens['access_token'];
//            $cookie = \cookie('jwt', $token, 3600);
//
//            return \response(['token' => $token])->withCookie($cookie);

        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function user(Request $request)
    {
        try {
            $user = \Auth::user();

            return UserResource::make($user);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }

    public function logout()
    {
        try {
            /** @var $user User */
            $user = \Auth::user();

            $this->passportService->logout($user);

            return $this->successJsonMessage(true);

            // через cookie
//            $cookie = \Cookie::forget('jwt');
//
//            return \response(['message' => 'success'])->withCookie($cookie);
        } catch (\Exception $e){
            return $this->errorJsonMessage($e->getMessage(), $e->getCode());
        }
    }
}
