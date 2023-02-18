@extends('layouts.lideranca')
@section('titulo', 'Chamada refukids')

@section('conteudo')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chamada Refukids</h4>
                    <span>{{ $turma->nome }}</span>
                </div>
            </div>
            </div>
        <div class="card">
            <div class="card-body">
                @livewire('lideranca.turma.chamada', ['turma' => $turma])
            </div>
        </div>
    </div>
@endsection
