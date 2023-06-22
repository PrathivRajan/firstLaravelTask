<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MyController;




Route::get('/', function () {
    return view('welcome');
})->name('/');


Route::get('/Category', [MyController::class, 'category'])->middleware('auth');
Route::post('/add-category', [MyController::class, 'addCategory']);

Route::get('/Product/{category?}', [MyController::class, 'products']);
Route::post('/add-product', [MyController::class, 'addProduct'])->name('product.add');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
    Route::get('/login', [AuthController::class, 'login'])->name('login');  // login view page
});

Route::group(['middleware' => 'auth'], function ()
{
    Route::get('/home', [MyController::class, 'index'])->name('home')->middleware('otp.check');
    Route::get('session/get','MyController@index');
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/Search', [MyController::class, 'search']);
Route::post('/login', [AuthController::class, 'handleLogin'])->name('handle.login');
Route::post('/otp/verify', [AuthController::class, 'handleOtp'])->name('handle.otp');
