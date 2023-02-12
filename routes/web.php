<?php

use App\Http\Controllers\Lideranca\Auth\LoginLiderancaController;
use App\Http\Controllers\Lideranca\Auth\LogoutLiderancaController;
use App\Http\Controllers\Lideranca\RefukidsLiderancaController;
use App\Http\Controllers\Portal\InicioController;
use App\Http\Controllers\Portal\RefukidsController;
use App\Http\Controllers\Lideranca\DashboardLiderancaController;
use App\Http\Livewire\Lideranca\Refukids\ChamadaRefukidsLiderancaLivewire;
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
Route::get('/politica-de-privacidade', [InicioController::class, "politica"])->name('politica');
Route::post('refukids/salvar', [RefukidsController::class, "salvar"])->name('refukids.salvar');
Route::get('refukids/cadastro', [RefukidsController::class, "cadastro"])->name('refukids.cadastro');

// Admin
Route::get('lideranca/login', [LoginLiderancaController::class, "redirect"])->name('lideranca.login');
Route::get('lideranca/login/informacoes', [LoginLiderancaController::class, "callback"]);

Route::middleware('auth')
    ->group(function() {
        Route::get('lideranca', [DashboardLiderancaController::class, "pagina"])->name('lideranca.inicio');
        Route::get('lideranca/logout', [LogoutLiderancaController::class, "execute"])->name('lideranca.logout');
        Route::get('lideranca/refukids', [RefukidsLiderancaController::class, "pagina"])->name('lideranca.refukids');
        Route::get('lideranca/refukids/chamada/{turma}', ChamadaRefukidsLiderancaLivewire::class)->name('lideranca.refukids.chamada');
    });

