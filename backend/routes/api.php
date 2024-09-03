<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/showgame',[MainController::class,'showGame']);
Route::post('/showcard',[CardController::class,'showCard']);