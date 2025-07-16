<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ServiceController;
<<<<<<< HEAD
=======
use App\Http\Controllers\Api\CompanyInfoController;
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)

use App\Http\Controllers\Api\ContactFormController;

use App\Http\Controllers\Api\CompanyInfoController;
use App\Http\Controllers\Api\ServiceRequestController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
<<<<<<< HEAD
=======

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{service}', [ServiceController::class,'show']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{service}', [ServiceController::class, 'show']);

Route::controller(AuthController::class)->group(function () {

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('logout', 'AuthController@logout');
});
<<<<<<< HEAD
Route::post('/service-requests', [ServiceRequestController::class,'create']);

// Route::post()
// Route::get('/service',[ServiceController::class,'index']);
Route::get('/information',[CompanyInfoController::class,'info']);

Route::resource('contact-form', ContactFormController::class);
=======
// Route::post()
// Route::get('/service',[ServiceController::class,'index']);
Route::get('/information',[CompanyInfoController::class,'info']);
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)
