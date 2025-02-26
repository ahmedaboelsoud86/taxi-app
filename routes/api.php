<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::controller(AuthController::class)->group(function(){
    Route::post('/users','register');
    Route::post('/users/login','login');
    Route::post('/users/verify-email','vaildateUserEmail');
});


