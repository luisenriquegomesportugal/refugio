@extends('layouts.lideranca')
@section('titulo', 'Liberar Acesso :: Configuração')

@section('conteudo')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Liberar acesso</h4>
                    <span>Configuração</span>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @livewire('lideranca.modals.configuracao.liberar-acesso-permissoes', ['usuarios' => $usuarios])
            </div>
        </div>
    </div>
@endsection
