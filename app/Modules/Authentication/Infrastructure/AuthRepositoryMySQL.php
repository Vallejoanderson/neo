<?php

namespace App\Modules\Authentication\Infrastructure;

use App\Models\User;
use Illuminate\Http\Request;
use App\Modules\Authentication\Domain\AuthRepositoryInterface;

class AuthRepositoryMySQL implements AuthRepositoryInterface
{
    public function register(Request $request)
    {
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            return $user;
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function login() {}
}
