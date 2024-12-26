<?php

use App\Modules\Purchase\Http\Controllers\PurchaseController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1/purchase')->middleware('auth:api')->group(function (){
    Route::post('save', [PurchaseController::class, 'save']);
});
