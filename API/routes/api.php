<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriberController;

Route::prefix('subscribers')->group(function () {
    Route::get('/', [SubscriberController::class, 'index']);
    Route::get('/{id}', [SubscriberController::class, 'show']);
    Route::post('/', [SubscriberController::class, 'store']);
    Route::put('/{id}', [SubscriberController::class, 'update']);
    Route::delete('/{id}', [SubscriberController::class, 'destroy']);
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
