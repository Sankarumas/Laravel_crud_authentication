<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Api\UserController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{id}', [UserController::class, 'show']);
Route::get('user/{id}/edit', [UserController::class, 'edit']);
Route::put('user/{id}/edit', [UserController::class, 'update']);
Route::delete('user/{id}/delete', [UserController::class, 'destroy']);

Route::post('/register',[ApiController::class,'register']);
Route::post('/login',[ApiController::class,'login']);
Route::get('/detail',[ApiController::class,'detail'])->middleware('auth:sanctum');