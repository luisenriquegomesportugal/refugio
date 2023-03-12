<?php

use App\Http\Controllers\Lideranca\Auth\LoginLiderancaController;
use App\Http\Controllers\Lideranca\Auth\LogoutLiderancaController;
use App\Http\Controllers\Lideranca\DashboardLiderancaController;
use App\Http\Controllers\Lideranca\Refukids\RefukidsLiderancaController;
use App\Http\Controllers\Lideranca\Refukids\RefukidsTurmaLiderancaController;
use App\Http\Controllers\Portal\InicioController;
use App\Http\Controllers\Portal\RefukidsController;
use App\Http\Controllers\ImagemController;
use App\Http\Controllers\Lideranca\Configuracao\LiberarAcessoLiderancaController;
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
Route::get('/download', [ImagemController::class, "download"])->name('download');

//Refukids
Route::post('refukids/salvar', [RefukidsController::class, "salvar"])->name('refukids.salvar');
Route::get('refukids/cadastro', [RefukidsController::class, "cadastro"])->name('refukids.cadastro');

// Admin
Route::get('lideranca/login', [LoginLiderancaController::class, "redirect"])->name('lideranca.login');
Route::get('lideranca/login/informacoes', [LoginLiderancaController::class, "callback"]);

Route::middleware('auth')
    ->group(function() {
        Route::get('lideranca', [DashboardLiderancaController::class, "pagina"])->name('lideranca.inicio');
        Route::get('lideranca/logout', [LogoutLiderancaController::class, "execute"])->name('lideranca.logout');

        Route::get('lideranca/refukids', [RefukidsLiderancaController::class, "pagina"])
            ->middleware("can:" . \App\Libraries\Permissoes::VISUALIZAR_LISTAGEM_DA_REFUKIDS)
            ->name('lideranca.refukids');

        Route::get('lideranca/refukids/turma/{turma}', [RefukidsTurmaLiderancaController::class, "turma"])
            ->middleware("can:" . \App\Libraries\Permissoes::FAZER_CHAMADA_DA_REFUKIDS)
            ->name('lideranca.refukids.chamada');

        Route::get('lideranca/refukids/turma/{turma}/chamada/{turma_chamada}', [RefukidsTurmaLiderancaController::class, "turma_chamada"])
            ->middleware("can:" . \App\Libraries\Permissoes::FAZER_CHAMADA_DA_REFUKIDS)
            ->name('lideranca.refukids.chamada.presentes');

        Route::get('lideranca/configuracao/liberar-acesso', [LiberarAcessoLiderancaController::class, "pagina"])
            ->middleware("can:" . \App\Libraries\Permissoes::LIBERAR_ACESSO)
            ->name('lideranca.configuracao.liberar-acesso');

    });

