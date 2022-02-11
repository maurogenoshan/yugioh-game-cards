<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
Route::group(['prefix' => 'v1'], function () {
    Route::get('cards',[CardsController::class, 'index'])->name("show-all-cards");
    Route::get('cards/{id}', [CardsController::class, 'show'])->name("show-card");
});
Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {
    Route::post('login', [AuthController::class, 'signin'])->name("login");
    Route::post('register', [AuthController::class, 'signup'])->name("register");
    Route::post('cards', [CardsController::class, 'store'])->name("store-card");
    Route::put('cards/{id}', [CardsController::class, 'update'])->name("update-card");
    Route::delete('students/{id}',[CardsController::class, 'delete'])->name("delete-card");
});
