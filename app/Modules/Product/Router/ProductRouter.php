<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/product')->middleware('auth:api')->group(function (){
    Route::get('', [ProductController::class, 'index']);
    Route::post('save', [ProductController::class, 'save']);
});
