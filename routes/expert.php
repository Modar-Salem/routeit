<?php

use Illuminate\Support\Facades\Route;



Route::controller(\App\Http\Controllers\Expert\AuthController::class)->group(function () {
    Route::get('register', 'create')->name('expert.register');

    Route::post('register' , 'register')->name('expert.register.save') ;

    Route::get('/' , 'login')->name('expert.login');

    Route::post('login', 'loginAction')->name('expert.login.action');

    Route::post('logout', 'logout')->name('expert.logout')->middleware(['auth:expert']);
});
Route::controller(\App\Http\Controllers\Expert\RoadMapController::class)->middleware(['auth:expert'])->prefix('roadmap')->group(function () {
    Route::get('create' , 'create')->name('expert.roadmap.create') ;
    Route::post('store' , 'store')->name('expert.roadmap.save') ;
});
Route::middleware(['auth:expert'])->group(function (){
    Route::get('dashboard' , [\App\Http\Controllers\Expert\AuthController::class , 'dashboard'])->name('expert.dashboard');
});

Route::controller(\App\Http\Controllers\Expert\SkillController::class)->middleware(['auth:expert'])->prefix('skill')->group(function () {

    Route::get('index/{roadmap_id}' , 'index')->name('expert.skills.index') ;
    Route::get('create/{roadmap_id}' , 'create')->name('expert.skills.create') ;
    Route::post('store/{roadmap_id}' , 'store')->name('expert.skills.store') ;
    Route::get('/{skill}' , 'show')->name('expert.skills.show') ;
    Route::get('{skill}/edit' , 'edit')->name('expert.skills.edit') ;
    Route::put('/{skill}' , 'update')->name('expert.skills.update') ;
    Route::delete('/{skill}' , 'destroy')->name('expert.skills.destroy') ;
});
