<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\API\IngredientController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Sanctum Stateful Middleware for SPA Authentication
Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    // Authentication Routes
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('register', [AuthController::class, 'register']);
    Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');
});

// Recipes CRUD
Route::apiResource('recipes', RecipeController::class);
// Ingredients CRUD
Route::apiResource('ingredients', IngredientController::class);
// Protected Routes
Route::middleware('auth:sanctum')->group(function () {


});
