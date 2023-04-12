<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CityController;
 
Route::resource('city', CityController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('welcome');
});
