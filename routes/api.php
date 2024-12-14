<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Modules\Authentication\Http\Controllers\AuthController;
use App\Modules\Category\Http\Controllers\CategoryController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/register', [AuthController::class, 'register']);
        Route::post('/login', [AuthController::class, 'login']);
    });

    Route::prefix('category')->middleware('auth:api')->group(function () {
        Route::get('/', [CategoryController::class, 'get']);
    });
});

Route::fallback(function () {
    return response()->json([
        'success'   => false,
        'type'      => 'error',
        'code'      => 404,
        'message'   => 'No encontrado.'
    ], 404);
});
