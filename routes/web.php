<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('auth.login');
});


Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/client', function () {
    return view('client.home');
});

Route::get('/lawyer', function () {
    return view('lawyer.home');
});


Route::post('/auth/login', [AuthController::class, "login"])->name('login_send');
