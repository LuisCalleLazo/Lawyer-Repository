<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LawyerController;

// INICIO DE SESSION Y SEGURIDAD
Route::get('/', function () { return view('auth.login'); });
Route::post('/auth/login', [AuthController::class, "login"])->name('login_send');
Route::post('/auth/logout', [AuthController::class, "logout"])->name('logout');


// RUTAS DE ADMINISTRADOR
Route::get('/admin', function () { return view('admin.home'); });
Route::get('/admin/admins', [AdminController::class, "index"])->name('admins');
Route::get('/admin/rols', [AdminController::class, "rols"])->name('rols');
Route::get('/admin/clients', [AdminController::class, "clients"])->name('clients');
Route::get('/admin/lawyers', [AdminController::class, "lawyers"])->name('lawyers');
Route::get('/admin/contracts', [AdminController::class, "contracts"])->name('contracts');
Route::get('/admin/messages', [AdminController::class, "messages"])->name('messages');

// RUTAS DE CLIENTE
Route::get('/client', function () { return view('client.home'); });
Route::get('/client/search', [ClientController::class, "search"])->name('client_search_lawyer');
Route::get('/client/contracts', [ClientController::class, "contracts"])->name('client_contracts');
Route::get('/client/history', [ClientController::class, "history"])->name('client_history');
Route::get('/client/lawyers', [ClientController::class, "lawyers"])->name('client_lawyers');

// RUTAS DE ABOGADO
Route::get('/lawyer', function () { return view('lawyer.home'); });
Route::get('/lawyer/history', [LawyerController::class, "history"])->name('lawyer_history');
Route::get('/lawyer/contracts', [LawyerController::class, "contracts"])->name('lawyer_contracts');
Route::get('/lawyer/clients', [LawyerController::class, "clients"])->name('lawyer_clients');

// RUTAS EN COMUN ENTRE ABOGADO Y CLIENTE
Route::get('/client-lawyer/conversation', [LawyerController::class, "conversation"])->name('conversation');
