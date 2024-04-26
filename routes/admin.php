<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::controller(\App\Http\Controllers\Admin\AuthController::class)->group(function () {

    Route::get('register', 'create')->name('admin.register');

    Route::post('register' , 'register')->name('admin.register.save') ;

    Route::get('login', 'login')->name('admin.login');

    Route::post('login', 'loginAction')->name('admin.login.action');

    Route::post('logout', 'logout')->name('admin.logout')->middleware(['auth']);

});
Route::controller(\App\Http\Controllers\admin\TechnologyCategoryController::class)->middleware(['auth'])->prefix('technology_category')->group(function () {
    Route::get('index' , 'index')->name('admin.technology_category.index') ;
    Route::get('create' , 'create')->name('admin.technology_category.create') ;
    Route::post('store' , 'store')->name('admin.technology_category.store') ;
    Route::get('/{technology_category}' , 'show')->name('admin.technology_category.show') ;
    Route::get('{technology_category}/edit' , 'edit')->name('admin.technology_category.edit') ;
    Route::put('/{technology_category}' , 'update')->name('admin.technology_category.update') ;
    Route::delete('/{technology_category}' , 'destroy')->name('admin.technology_category.destroy') ;

});

Route::controller(\App\Http\Controllers\admin\TechnologyController::class)->middleware(['auth'])->prefix('technology')->group(function () {

    Route::get('index' , 'index')->name('admin.technology.index') ;
    Route::get('create' , 'create')->name('admin.technology.create') ;
    Route::post('store' , 'store')->name('admin.technology.store') ;
    Route::get('/{technology}' , 'show')->name('admin.technology.show') ;
    Route::get('{technology}/edit' , 'edit')->name('admin.technology.edit') ;
    Route::put('/{technology}' , 'update')->name('admin.technology.update') ;
    Route::delete('/{technology}' , 'destroy')->name('admin.technology.destroy') ;

});
Route::controller(\App\Http\Controllers\admin\TestController::class)->middleware(['auth'])->prefix('test')->group(function () {
    Route::get('index' , 'index')->name('admin.test.index') ;
    Route::get('create' , 'create')->name('admin.test.create') ;
    Route::post('store' , 'store')->name('admin.test.store') ;
});

Route::controller(\App\Http\Controllers\admin\TestQuestionController::class)->middleware(['auth'])->prefix('test_question')->group(function () {
    Route::get('index/{test_id}' , 'index')->name('admin.test_question.index') ;
    Route::get('create/{test_id}' , 'create')->name('admin.test_question.create') ;
    Route::post('store/{test_id}' , 'store')->name('admin.test_question.store') ;
    Route::get('show/{test_question_id}' , 'show')->name('admin.test_question.show') ;

});


Route::controller(\App\Http\Controllers\admin\MobileUserController::class)->middleware(['auth'])->prefix('mobile_user')->group(function () {
    Route::get('index' , 'index')->name('admin.mobile_user.index') ;
});
Route::controller(\App\Http\Controllers\admin\ExpertController::class)->middleware(['auth'])->prefix('expert')->group(function () {
    Route::get('index' , 'index')->name('admin.expert.index') ;
});

Route::middleware(['auth'])->group(function (){
    Route::get('dashboard' , [\App\Http\Controllers\Admin\AuthController::class , 'dashboard'])->name('admin.dashboard');

});

