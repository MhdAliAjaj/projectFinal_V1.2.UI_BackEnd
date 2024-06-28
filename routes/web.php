<?php
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\contactcontroller;
use App\Models\User;

use App\Mail\MyTestMail;
use App\Http\Controllers\MailController;


use App\Http\Controllers\OrdersController;
use App\Http\Controllers\CategoryController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Manually defining routes for UserController
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/create', [UserController::class, 'create'])->name('users.create');
Route::post('users', [UserController::class, 'store'])->name('users.store');
Route::get('users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

// Defining routes for CategoryController
//Route::resource('category', CategoryController::class);
Route::get('category', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');
Route::get('category/{category}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('category/{category}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('send-mail-form/{id}', [MailController::class, 'showMailForm'])->name('send-mail-form');

Route::resource('services', ServiceController::class);
Route::get('search', [ServiceController::class, 'search'])->name('search');


Route::get('orderReport', [ReportController::class, 'index'])->name('reports.index')->middleware('auth');
Route::get('annualReport', [ReportController::class, 'annualReport'])->name('reports.annual')->middleware('auth');


Route::post('send-mail', [MailController::class, 'sendMail'])->name('send-mail');




Route::get('order', [OrdersController::class, 'index'])->name('order.index');
Route::get('order/{order}', [OrdersController::class, 'handle'])->name('order.handle');
Route::get('orderReport', [ReportController::class, 'index'])->name('reports.index');
Route::get('annualReport', [ReportController::class, 'annualReport'])->name('reports.annual');
Route::get('contact', [contactcontroller::class, 'index'])->name('contact.index');


 