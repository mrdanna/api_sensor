<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EnvironmentDataController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('environment', [EnvironmentDataController::class, 'index']);
Route::post('environment', [EnvironmentDataController::class, 'store']);
Route::get('environment/{id}', [EnvironmentDataController::class, 'show']);
Route::put('environment/{id}', [EnvironmentDataController::class, 'update']);
Route::delete('environment/{id}', [EnvironmentDataController::class, 'destroy']);
