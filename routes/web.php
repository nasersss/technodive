<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CodingController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index1');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.welcome');
    })->name('home');

    Route::get('/change-language/{locale}', [LocaleController::class, 'switch'])->name('change.language');

    Route::get('reset/password', function () {
        return view('auth.reset-password');
    })->name('resetPassword');

    Route::post('reset/password', [AuthController::class, 'resetPassword'])->name('resetPassword');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/clear', [NotificationController::class, 'clear'])->name('clear_notification');

    Route::get('/makeNotificationSeen/{id}', [NotificationController::class, 'makeNotificationSeen'])->name('makeNotificationSeen');


});

Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');
