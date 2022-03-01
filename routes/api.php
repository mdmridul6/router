<?php

use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\SellerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [ApiAuthController::class, 'user']);
    Route::get('/logout', [ApiAuthController::class, 'signout']);
    Route::get('/sellers', [SellerController::class, 'index']);
});
