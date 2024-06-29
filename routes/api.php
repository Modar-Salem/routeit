<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\ExpertController;
use App\Http\Controllers\api\RoadmapUsersRankingController;
use App\Http\Controllers\api\UserCommentReplyController;
use App\Http\Controllers\api\UserFollowedExpertController;
use App\Http\Controllers\api\UserFollowedTechnologyController;
use App\Http\Controllers\api\UserSkillCommentController;
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
    Route::get('getStudentProfile', 'getStudentProfile');
    Route::put('editProfile', 'editProfile');
});

Route::controller(ExpertController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getExpertProfile', 'getExpertProfile');
});

Route::controller(UserFollowedExpertController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('showFollowedExperts', 'showFollowedExperts');
    Route::post('followExpert', 'followExpert');
    Route::delete('unfollowExpert', 'unfollowExpert');
});

Route::controller(TechnologyCategoriesController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getTechnologyCategories', 'getTechnologyCategories');
    Route::get('getTechnologies', 'getTechnologies');
    Route::get('getTechnologyLevels', 'getTechnologyLevels');
    Route::get('searchTechnologyCategories', 'searchTechnologyCategories');
    Route::get('searchTechnologies', 'searchTechnologies');
});

Route::controller(UserFollowedTechnologyController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('showFollowedTechnologies', 'showFollowedTechnologies');
    Route::post('followTechnology', 'followTechnology');
    Route::delete('unfollowTechnology', 'unfollowTechnology');
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

Route::controller(UserCommentReplyController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->prefix('userCommentReply')->group(function () {
    Route::get('get', 'get');
    Route::post('add', 'add');
    Route::put('edit', 'edit');
    Route::delete('delete', 'delete');
});

Route::controller(RoadmapUsersRankingController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getRoadmapRanking', 'getRoadmapRanking');
    Route::get('test', 'test');
});
