<?php

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
