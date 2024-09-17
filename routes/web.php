<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;

Route::view('/','auth.login');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'admin','middleware' => 'is_admin', 'as' => 'admin.'], function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
    });

});
