<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\HibaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
// Hibás, nem kapott meg a várt eredmény
//Route::get("/hiba", [HibaController::class, 'index']);

Route::apiResource("/hiba", HibaController::class);

Route::post("/register", [AuthController::class, "register"]);
Route::post("/login", [AuthController::class, "login"]);
Route::post("/logout", [AuthController::class, "logout"])->middleware("auth:sanctum");
Route::post("/logout-everywhere", [AuthController::class, "logoutEverywhere"])->middleware("auth:sanctum");

