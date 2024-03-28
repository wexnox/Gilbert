<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{any}', function () {
    return view('app'); // Assuming 'app' is the blade view that includes your Vue app
})->where('any', '.*');
