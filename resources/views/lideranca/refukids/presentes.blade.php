@extends('layouts.lideranca')

@if(\Carbon\Carbon::parse($turmaChamada->dia)->isCurrentDay())
    @section('titulo', "Hoje :: {$turma->nome} :: Chamada refukids")
@else
    @section('titulo', \Carbon\Carbon::parse($turmaChamada->dia)->format('d/m/Y') . " :: {$turma->nome} :: Chamada refukids")
@endif

@section('conteudo')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-1 d-flex justify-content-center align-items-center">
                <a href="{{ back()->getTargetUrl() }}">
                    <i class="fa fa-2x fa-arrow-left"></i>
                </a>
            </div>
            <div class="col">
                <div class="row">
                    <div class="col-sm-6 p-md-0">
                        <div class="welcome-text">
                            <h4>Chamada Refukids</h4>
                            <span>{{ $turma->nome }}</span>
                        </div>
                    </div>
                    <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <div class="welcome-text">
                    <span>
                        @if(\Carbon\Carbon::parse($turmaChamada->dia)->isCurrentDay())
                            Hoje
                        @else
                            {{ \Carbon\Carbon::parse($turmaChamada->dia)->format('d/m/Y') }}
                        @endif
                    </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                @livewire('lideranca.turma.presentes', ['turma' => $turma, 'turmaChamada' => $turmaChamada, 'membros' =>
                $membros])
            </div>
        </div>
    </div>
@endsection
