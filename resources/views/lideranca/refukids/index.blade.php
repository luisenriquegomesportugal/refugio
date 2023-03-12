@extends('layouts.lideranca')
@section('titulo', 'Refukids')

@section('conteudo')
    <div class="container-fluid">
        <div class="row page-titles mx-0">
            <div class="col-sm-6 p-md-0">
                <div class="welcome-text">
                    <h4>Refukids</h4>
                    <span>Crianças cadastradas</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-borderless">
                    <tbody>
                    @foreach ($refukids as $crianca)
                        <tr>
                            <td>
                                @livewire('lideranca.refukids.card-crianca', ['membro' => $crianca], key($crianca->id))
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {!! $refukids->links('pagination::default') !!}
            </div>
        </div>
    </div>
@endsection
