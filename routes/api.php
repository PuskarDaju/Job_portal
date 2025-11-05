<?php

use App\Http\Api\AuthController;
use App\Http\Middleware\IsUserAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('/trytologin',[AuthController::class,'login']);

Route::middleware('auth:sanctum')->group(function () {

   Route::middleware(IsUserAdmin::class)->group(function () {
       Route::get('/logout',[AuthController::class,'logout']);
   });
});


