<?php

use Illuminate\Support\Facades\Route;

Route::get('/app/{any}', function () {
    return view('welcome');
});
