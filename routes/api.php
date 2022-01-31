<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CardsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/




Route::group(['prefix' => 'api/v1', 'middleware' => ['auth:sanctum']], function () {
    Route::post('login', [AuthController::class, 'signin']);
    Route::post('register', [AuthController::class, 'signup']);
    Route::resource('cards', CardsController::class);
});
