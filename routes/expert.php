<?php

use Illuminate\Support\Facades\Route;



Route::controller(\App\Http\Controllers\Expert\AuthController::class)->group(function () {
    Route::get('register', 'create')->name('expert.register');

    Route::post('register' , 'register')->name('expert.register.save') ;

    Route::get('/' , 'login')->name('expert.login');

    Route::post('login', 'loginAction')->name('expert.login.action');

    Route::post('logout', 'logout')->name('expert.logout')->middleware(['auth']);
});


Route::middleware(['auth'])->group(function (){
    Route::get('dashboard' , [\App\Http\Controllers\Expert\AuthController::class , 'dashboard'])->name('expert.dashboard');
});
