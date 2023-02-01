<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\WorkController;
use App\Http\Controllers\CodingController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\Services\UploadController;
use App\Http\Controllers\Services\ContactController;

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
Route::get('/contact', [ContactController::class,'contact'])->name('contact');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest');

#services
Route::get('/services/list',[ServiceController::class,'index'])->name('service_list');
Route::post('/services/store',[ServiceController::class,'store'])->name('service_store');
Route::post('/services/update',[ServiceController::class,'update'])->name('service_update');
Route::get('/service/delete/{id}',[ServiceController::class,'destroy'])->name('service_delete');
#works
Route::post('/works/store',[WorkController::class,'store'])->name('work_store');
Route::get('/works/list',[WorkController::class,'index'])->name('work_list');
Route::post('/works/update',[WorkController::class,'update'])->name('work_update');
Route::get('/works/show/{workId}',[WorkController::class,'showImages'])->name('work_show_images');
Route::get('/works/image/delete/{imageId}',[WorkController::class,'deleteImage'])->name('work_image_delete');
Route::get('/works/delete/{id}',[WorkController::class,'destroy'])->name('work_delete');

#upload image

Route::post('upload/image',[UploadController::class,'uploadImage'])->name('uploadImage');
Route::get('delete/image/{path}',[UploadController::class,'deleteImage'])->name('deleted_image');

#equipment
Route::get('/equipments/list',[EquipmentController::class,'index'])->name('equipment_list');
Route::post('/equipments/store',[EquipmentController::class,'store'])->name('equipment_store');
Route::post('/equipments/update',[EquipmentController::class,'update'])->name('equipments_update');
Route::get('/equipments/delete/{id}',[EquipmentController::class,'destroy'])->name('equipments_delete');

#certificate
Route::get('/certificates/list',[CertificateController::class,'index'])->name('certificate_list');
Route::post('/certificates/store',[CertificateController::class,'store'])->name('certificate_store');
Route::post('/certificates/update',[CertificateController::class,'update'])->name('certificates_update');
Route::get('/certificates/delete/{id}',[CertificateController::class,'destroy'])->name('certificate_delete');

#team
Route::get('/team/list',[TeamController::class,'index'])->name('team_list');
Route::post('/team/store',[TeamController::class,'store'])->name('team_store');
Route::post('/team/update',[TeamController::class,'update'])->name('team_update');
Route::get('/team/delete/{id}',[TeamController::class,'destroy'])->name('team_delete');


#customer
Route::get('/customer/list',[CustomerController::class,'index'])->name('customer_list');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer_store');
Route::post('/customer/update',[CustomerController::class,'update'])->name('customer_update');
Route::get('/customer/delete/{id}',[CustomerController::class,'destroy'])->name('customer_delete');

Route::post('/contact/store',[ContactController::class,'store'])->name('contact_us_store');
