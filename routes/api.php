<?php

use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('search',[HotelController::class,'getValuesFromdb'])->name('search');
Route::post('search',[HotelController::class,'getValuesFromdbSearched']);