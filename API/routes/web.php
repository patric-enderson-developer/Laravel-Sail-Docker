<?php

use App\Http\Controllers\Api\SubscriberController;
use Illuminate\Support\Facades\Route;
use App\Services\SubscriberService;


Route::get('/test-subscriber', function (SubscriberService $service) {
    return response()->json(
        $service->getAll()
    );
});
Route::get('/', function () {
    return view('welcome');
});


Route::prefix('subscribers')->group(function () {
    Route::get('/', [SubscriberController::class, 'index']);
    Route::post('/', [SubscriberController::class, 'store']);

});
