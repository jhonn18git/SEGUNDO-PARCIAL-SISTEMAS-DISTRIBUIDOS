<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SalidasController;
use App\Http\Controllers\LoginController;
use App\Http\middleware\JwtMiddleware;
Route::apiResource('salidas', SalidasController::class)
    ->middleware(JwtMiddleware::class);

Route::Post('\login',([LoginController::class,'login']));