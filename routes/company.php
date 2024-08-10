<?php

use Illuminate\Support\Facades\Route;



Route::controller(\App\Http\Controllers\Company\AuthController::class)->group(function () {
    Route::get('register', 'create')->name('company.register');

    Route::post('register' , 'register')->name('company.register.save') ;

    Route::get('/' , 'login')->name('company.login');

    Route::post('login', 'loginAction')->name('company.login.action');

    Route::post('logout', 'logout')->name('company.logout')->middleware(['auth:company']);

    Route::get('dashboard' , 'dashboard')->name('company.dashboard')->middleware(['auth:company']);
});

Route::controller(\App\Http\Controllers\Company\CompetitionController::class)->prefix('competition')->middleware(['auth:company'])->group(function () {
    Route::get('index/{competitionID}' , 'index')->name('company.competition.index');

    Route::get('create' , 'create')->name('company.competition.create') ;

    Route::post('store' , 'store')->name('company.competition.store') ;

    Route::delete('destroy/{id}' , 'destroy')->name('company.competition.destroy') ;

    Route::get('/competition/{id}/edit',  'edit')->name('company.competition.edit');
    Route::put('/competition/{id}',  'update')->name('company.competition.update');

    Route::post('/competition/{competition}/assign-winner' ,  'assignWinner')->name('competition.assign-winner');

});

