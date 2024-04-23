<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\RoadmapsController;
use App\Http\Controllers\api\TechnologyCategoriesController;
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

Route::controller(AuthController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('checkEmailVerificationCode', 'checkEmailVerificationCode');
    Route::post('completeRegister', 'completeRegister');
});

Route::middleware('auth:sanctum')->group( function () {
    /* Auth Controller */
    Route::post('logout', [AuthController::class, 'logout']);
    /* TechnologyCategories Controller */
    Route::get('getTechnologyCategories', [TechnologyCategoriesController::class, 'getTechnologyCategories']);
    Route::get('getTechnologies', [TechnologyCategoriesController::class, 'getTechnologies']);
    Route::get('getTechnologyLevels', [TechnologyCategoriesController::class, 'getTechnologyLevels']);
    /* Roadmaps Controller*/
    Route::get('getRoadmaps', [RoadmapsController::class, 'getRoadmaps']);
    Route::get('getRoadmapSkills', [RoadmapsController::class, 'getRoadmapSkills']);
});
