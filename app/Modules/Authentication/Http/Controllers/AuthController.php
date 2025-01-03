<?php

namespace App\Modules\Authentication\Http\Controllers;

use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Modules\Authentication\Domain\AuthServiceInterface;

class AuthController extends Controller
{
    private AuthServiceInterface $authService;

    public function __construct()
    {
        $this->authService = App::make(AuthServiceInterface::class);
    }

    public function register(Request $request)
    {
        return $this->authService->register($request);

    }

    public function login(Request $request) {
        return $this->authService->login($request);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
        ]);
    }
}
