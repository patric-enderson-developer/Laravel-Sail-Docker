<?php

use App\Http\Controllers\Api\SubscriberController;
use Illuminate\Support\Facades\Route;
use App\Services\SubscriberService;


Route::get('/test-subscriber', function (SubscriberService $service) {
    return response()->json(
        $service->getAll()->paginate(100)
    );
});
Route::get('/', function () {
    return view('welcome');
});



