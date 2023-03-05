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
                <div class="table-responsive">
                    <table class="table table-bordered table-hover style-1" id="liberar-acesso">
                        <thead>
                        <tr>
                            <th>
                                <b>Usuário</b>
                            </th>
                            <th>
                                <b>Status</b>
                            </th>
                            <th>
                                <b>Permissões</b>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($usuarios as $usuario)
                            <tr>
                                <td>
                                    <div class="media align-items-center style-1">
                                        @if($usuario->foto)
                                            <img src="{{ $usuario->foto }}"
                                                 class="img-fluid object-fit-cover default-modal-image-preview" alt=""
                                                 style="width: 50px; height: 50px">
                                        @else
                                            <span
                                                class="icon-name text-uppercase bgl-info text-info">
                                            {{ $usuario->nome[0] }}{{ last(explode(' ', $usuario->nome))[0] }}
                                        </span>
                                        @endif
                                        <div class="media-body ms-3">
                                            <h6>{{ $usuario->nome_completo }}</h6>
                                            <span>{{ $usuario->email }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if($usuario->permissoes->isNotEmpty())
                                        <span class="badge badge-success">Acesso liberado</span>
                                    @else
                                        <span class="badge badge-danger">Sem acesso</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-outline-info btn-xs light px-2"
                                       data-bs-toggle="modal"
                                       data-bs-target="#liberar-acesso-permissoes-{{$usuario->id}}">
                                        <i class="fa fa-key me-2"></i>
                                        Alterar
                                    </a>
                                    <div class="modal fade" id="liberar-acesso-permissoes-{{$usuario->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Alterar permissões</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @livewire('lideranca.modals.configuracao.liberar-acesso-permissoes', ['usuario' => $usuario], key($usuario->id))
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{ $usuarios->links('pagination::simple-default') }}
                </div>
            </div>
        </div>
    </div>
@endsection
