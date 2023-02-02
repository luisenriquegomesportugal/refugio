<?php

use App\Http\Controllers\Auth\GoogleSocialiteController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\RefukidsController;
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

// Home
Route::get('/', [InicioController::class, "pagina"])->name('inicio');

// Refukids
Route::get('refukids', [RefukidsController::class, "pagina"])->name('refukids');
Route::post('refukids', [RefukidsController::class, "salvar"])->name('refukids.salvar');

// Auth
Route::get('auth/logout', [LogoutController::class, "execute"])->name('auth.logout');

// Google Auth
Route::get('/auth/google/redirect', [GoogleSocialiteController::class, "redirect"])->name('auth.google.redirect');
Route::get('/auth/google/callback', [GoogleSocialiteController::class, "callback"]);
