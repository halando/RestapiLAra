<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DrinkController;
use App\Http\Controllers\Api\PackageController;

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

Route::get("/drinks",[DrinkController::class,"getDrinks"]);
Route::get("/onedrink",[DrinkController::class,"getOneDrink"]);
Route::post("/newdrink",[DrinkController::class,"addDrink"]);
Route::put("/modifydrink",[DrinkController::class,"modifyDrink"]);
Route::delete("/destroy",[DrinkController::class,"destroyDrink"]);
Route::get("/package",[PackageController::class,"packageDrink"]);


Route::get("/packages",[PackageController::class,"getPackages"]);
Route::get("/types",[TypeController::class,"getTypes"]);
Route::post("/newtype",[PackageController::class,"addDrink"]);
Route::put("/modifydrink",[TypeController::class,"modifyDrink"]);
Route::delete("/destroy",[TypeController::class,"destroyDrink"]);
Route::get("/package",[PackageController::class,"packageDrink"]);