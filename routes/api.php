<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ServiceController;
<<<<<<< HEAD
=======
use App\Http\Controllers\Api\CompanyInfoController;
>>>>>>> e8c5f1935990507f1d204e619f21bd4422eddded

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{service}', [ServiceController::class,'show']);

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');

<<<<<<< HEAD
=======

>>>>>>> e8c5f1935990507f1d204e619f21bd4422eddded

});
// Route::post()
Route::get('/service',[ServiceController::class,'index']);
Route::get('/information',[CompanyInfoController::class,'info']);
