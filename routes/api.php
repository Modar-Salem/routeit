<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\UserSkillCommentController;
use App\Http\Controllers\api\CommentReply;
use App\Http\Controllers\api\MobileUserController;
use App\Http\Controllers\api\RoadmapsController;
use App\Http\Controllers\api\TechnologyCategoriesController;
use App\Http\Controllers\api\TestController;
use App\Http\Controllers\api\TestQuestionController;
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

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register');
    Route::post('login', 'login');
    Route::post('forgetPassword', 'forgetPassword');
    Route::post('checkResetPasswordCode', 'checkResetPasswordCode');
    Route::post('resetPassword', 'resetPassword');
});

Route::controller(AuthController::class)->middleware(['auth:sanctum'])->group(function () {
    Route::post('checkEmailVerificationCode', 'checkEmailVerificationCode');
    Route::post('completeRegister', 'completeRegister');
});

Route::controller(AuthController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::post('logout', 'logout');
});

Route::controller(MobileUserController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::put('editProfile', 'editProfile');
});

Route::controller(TechnologyCategoriesController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getTechnologyCategories', 'getTechnologyCategories');
    Route::get('getTechnologies', 'getTechnologies');
    Route::get('getTechnologyLevels', 'getTechnologyLevels');
});

Route::controller(RoadmapsController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getRoadmaps', 'getRoadmaps');
    Route::get('getRoadmapSkills', 'getRoadmapSkills');
    Route::get('getSkillVideos', 'getSkillVideos');
    Route::get('getSkillArticles', 'getSkillArticles');
    Route::get('getArticleSections', 'getArticleSections');
});

Route::controller(TestController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::post('saveTestResult', 'saveTestResult');
});

Route::controller(TestQuestionController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getTestQuestions', 'getTestQuestions');
});

Route::controller(UserSkillCommentController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->prefix('userSkillComment')->group(function () {
    Route::get('get', 'get');
    Route::post('add', 'add');
    Route::put('edit', 'edit');
    Route::delete('delete', 'delete');
});

Route::controller(CommentReply::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->prefix('commentReply')->group(function () {
    Route::get('get', 'get');
});
