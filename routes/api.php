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
//Route::get("/hiba", [HibaController::class, 'index']);

//Auth utak
Route::post("/register", [AuthController::class, "register"]); //regisztráció
Route::post("/login", [AuthController::class, "login"]); //bejelentkezés
Route::post("/logout", [AuthController::class, "logout"])->middleware("auth:sanctum"); //adott kijelentkezés
Route::post("/logout-everywhere", [AuthController::class, "logoutEverywhere"])->middleware("auth:sanctum"); //kijelentkezés mindenhonnan

//Hiba bejelentések útjai
Route::get("/indexAll", [HibaController::class, "indexAll"])->middleware("auth:sanctum"); //minden bejelentés megtekintése
Route::get("/index", [HibaController::class, "index"])->middleware("auth:sanctum"); //saját bejelentések megtekintése
Route::post("/store", [HibaController::class, "store"])->middleware("auth:sanctum"); //mentés
Route::get("/hibak/{id}", [HibaController::class, "show"])->middleware("auth:sanctum"); //egy bejelentés megtekintése
Route::patch("/update/{id}", [HibaController::class, "update"])->middleware("auth:sanctum"); //egy bejelentés módosítása
Route::delete("/destroy/{id}", [HibaController::class, "destroy"])->middleware("auth:sanctum"); //egy bejelentés törlése
Route::get("/kuka-admin", [HibaController::class, "kukaAdmin"])->middleware("auth:sanctum"); //összes törölt elem megtekintése
Route::get("/kuka", [HibaController::class, "kukaUser"])->middleware("auth:sanctum"); //saját törölt elemek megtekintése
Route::patch("/hiba/remove-image/{id}", [HibaController::class, "removeImage"])->middleware("auth:sanctum"); //kép eltávolítása

Route::apiResource("/hiba", HibaController::class)->middleware("auth:sanctum");

//User lekérdezések
Route::get("/indexAllUser", [AuthController::class, "indexAllUser"])->middleware("auth:sanctum"); //minden felhasználó megtekintése
