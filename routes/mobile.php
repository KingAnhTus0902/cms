<?php

use App\Http\Controllers\Mobile\AuthController;
use App\Http\Controllers\Mobile\CadresController;
use App\Http\Controllers\Mobile\MedicalSessionsController;
use App\Http\Controllers\Mobile\NewsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| App Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your mobile application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "app" middleware group. Enjoy building your App!
|
*/


Route::prefix('/auth')->name('mobile.')->group(function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('forgot-password');
    Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify-otp');
    Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('reset-password');
    Route::group(['middleware' => 'verifyToken'], function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::post('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
        Route::prefix('/profile')->name('cadres.')->group(function () {
            Route::get('/', [CadresController::class, 'detail'])->name('profile');
        });
        Route::prefix('/medical')->name('medical.')->group(function () {
            Route::get('/', [MedicalSessionsController::class, 'list'])->name('list');
            Route::get('/{id}', [MedicalSessionsController::class, 'detail'])->name('detail');
        });
    });
});

Route::prefix('/news')->name('mobile.news.')->group(function () {
    Route::get('/', [NewsController::class, 'list'])->name('list');
    Route::get('/{id}', [NewsController::class, 'detailApiNews'])->name('detail');
});
