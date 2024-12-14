<?php

namespace App\Modules\Authentication\Domain;

use Illuminate\Http\Request;

interface AuthRepositoryInterface {
    public function register(Request $request);

    public function login();
}
