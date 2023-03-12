@extends('layouts.lideranca')
@section('titulo', $turma->nome . ' :: Chamada refukids')

@section('conteudo')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Chamada refukids</h4>
                    <span>{{ $turma->nome }}</span>
                </div>
            </div>
        </div>
        @livewire('lideranca.turma.chamada', ['turma' => $turma])
    </div>
@endsection
