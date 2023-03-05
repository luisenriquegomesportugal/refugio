<div class="row">
    <div class="col">
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
                               data-bs-target="#liberar-acesso-permissoes"
                               wire:click.prevent="selecionarUsuario({{$usuario->id}})">
                                <i class="fa fa-key me-2"></i>
                                Alterar
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="modal fade z-3" id="liberar-acesso-permissoes" wire:ignore.self>
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Alterar permissões</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="widget-media">
                                <ul class="timeline">
                                    @foreach(\App\Models\Permissao::orderBy('nome')->get() as $permissao)
                                        <li>
                                            <div class="timeline-panel">
                                                <div
                                                    class="custom-control custom-checkbox checkbox-warning check-lg me-3">
                                                    <input type="checkbox"
                                                           class="custom-control-input"
                                                           id="usuario-{{$usuario->id}}-permissao-{{$permissao->id}}"
                                                           wire:click.prevent="salvarPermissoes('{{ $permissao->id }}', '{{ $usuario->permissoes->contains($permissao) }}')"
                                                           wire:loading.remove
                                                           wire:target="salvarPermissoes('{{ $permissao->id }}', '{{ $usuario->permissoes->contains($permissao) }}')"
                                                        @checked($usuario->permissoes->contains($permissao))>
                                                    <i class="fa fa-spinner fa-spin" wire:loading
                                                       wire:target="salvarPermissoes('{{ $permissao->id }}', '{{ $usuario->permissoes->contains($permissao) }}')"></i>
                                                    <label class="custom-control-label"
                                                           for="usuario-{{$usuario->id}}-permissao-{{$permissao->id}}"></label>
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="mb-0">{{$permissao->nome}}</h5>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
