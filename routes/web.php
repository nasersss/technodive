<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CodingController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Services\UploadController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WorkController;
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
    return view('index');
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.welcome');
    })->name('home');


    Route::get('reset/password', function () {
        return view('auth.reset-password');
    })->name('resetPassword');

    Route::post('reset/password', [AuthController::class, 'resetPassword'])->name('resetPassword');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/clear', [NotificationController::class, 'clear'])->name('clear_notification');

    Route::get('/makeNotificationSeen/{id}', [NotificationController::class, 'makeNotificationSeen'])->name('makeNotificationSeen');

    ######## works ######################33
    Route::get('/works/store',[WorkController::class,'store'])->name('work_store');
    Route::get('/works/list',[WorkController::class,'index'])->name('work_list');


});
Route::get('/change-language/{locale}', [LocaleController::class, 'switch'])->name('change.language');

Route::get('/about', function () {
    return view('about_page');
})->name('about');
Route::get('/services', function () {
    return view('services_page');
})->name('services');
Route::get('/projects', function () {
    return view('projects_page');
})->name('projects');
Route::get('/hardware', function () {
    return view('hardware_page');
})->name('hardware');


Route::get('/our-expertise', function () {
    return view('our-expertise_page');
})->name('ourExpertise');

Route::get('/testimonial', function () {
    return view('testimonial_page');
})->name('testimonial');
Route::get('/team', function () {
    return view('team_page');
})->name('team');
Route::get('/contact', function () {
    return view('contact_page');
})->name('contact');

Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

Route::get('test',[TestController::class,'test']);
Route::get('/services/list',[ServiceController::class,'index'])->name('service_list');
Route::post('/services/store',[ServiceController::class,'store'])->name('service_store');
#upload image
Route::post('upload/image',[UploadController::class,'uploadImage'])->name('uploadImage');
Route::get('delete/image/{path}',[UploadController::class,'deleteImage'])->name('deleted_image');