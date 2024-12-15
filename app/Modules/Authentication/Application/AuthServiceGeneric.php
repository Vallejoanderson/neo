<?php

namespace App\Modules\Authentication\Application;

use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\App;
use App\Modules\Authentication\Domain\AuthServiceInterface;
use App\Modules\Authentication\Domain\AuthRepositoryInterface;

class AuthServiceGeneric implements AuthServiceInterface
{
    private AuthRepositoryInterface $authRepository;
    public function __construct()
    {
        $this->authRepository = App::make(AuthRepositoryInterface::class);
    }

    public function register($request) {

        $user = $this->authRepository->register($request);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function login($request) {
        $credentials = $request->only('email', 'password');

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
