<?php

use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\CompanyController;
use App\Http\Controllers\api\CompetitionController;
use App\Http\Controllers\api\CompetitionWinnerController;
use App\Http\Controllers\api\CompetitorController;
use App\Http\Controllers\api\ExpertController;
use App\Http\Controllers\api\RoadmapUsersRankingController;
use App\Http\Controllers\api\UserCommentReplyController;
use App\Http\Controllers\api\UserFollowedCompanyController;
use App\Http\Controllers\api\UserFollowedExpertController;
use App\Http\Controllers\api\UserFollowedTechnologyController;
use App\Http\Controllers\api\UserSkillCommentController;
use App\Http\Controllers\api\MobileUserController;
use App\Http\Controllers\api\RoadmapsController;
use App\Http\Controllers\api\TechnologyCategoriesController;
use App\Http\Controllers\api\TestController;
use App\Http\Controllers\api\TestQuestionController;
use App\Models\Competition;
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
    Route::post('editProfile', 'editProfile');
    Route::get('myProfile', 'myProfile');
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

Route::controller(UserFollowedCompanyController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('showFollowedCompanies', 'showFollowedCompanies');
    Route::post('followCompany', 'followCompany');
    Route::delete('unfollowCompany', 'unfollowCompany');
});

Route::controller(CompanyController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->group(function () {
    Route::get('getCompanyProfile', 'getCompanyProfile');
});

Route::controller(CompetitionController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->prefix('competition')->group(function () {
    Route::get('previous', 'previous');
    Route::get('current', 'current');
    Route::get('upcoming', 'upcoming');
    Route::get('all', 'all');
});

Route::controller(CompetitorController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->prefix('competitor')->group(function () {
    Route::post('register', 'register');
    Route::put('editProjectLink', 'editProjectLink');
    Route::get('competitions', 'competitions');
    Route::get('competitorDetails', 'competitorDetails');
    Route::get('competitors', 'competitors');
});

Route::controller(CompetitionWinnerController::class)->middleware(['auth:sanctum', 'verifiedAndCompleted'])->prefix('competitionWinners')->group(function () {
    Route::get('get', 'get');
});

