<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngredientController;
use App\Http\Controllers\RecipeController;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

//Route::apiResource('recipes', RecipeController::class);
//Route::apiResource('ingredients', IngredientController::class);

Route::post('/login', [AuthController::class, 'login']);


// Applying Sanctum's middleware to a single route
//Route::middleware([EnsureFrontendRequestsAreStateful::class])->get('/user', [YourApiController::class, 'user']);

// Applying Sanctum's middleware to a group of routes
Route::middleware([EnsureFrontendRequestsAreStateful::class])->group(function () {
    Route::apiResource('recipes', RecipeController::class);
    Route::apiResource('ingredients', IngredientController::class);
    // Define more routes that require Sanctum authentication here...
});

//Route::middleware('auth:sanctum')->group(function () {
//    Route::apiResource('recipes', RecipeController::class);
//    Route::apiResource('ingredients', IngredientController::class);
//});
