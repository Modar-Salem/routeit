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

Route::middleware(['auth'])->group(function (){
    Route::get('dashboard' , [\App\Http\Controllers\Admin\AuthController::class , 'dashboard'])->name('admin.dashboard');
});

