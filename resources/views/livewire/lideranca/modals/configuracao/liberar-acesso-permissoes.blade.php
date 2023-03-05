<div class="widget-media">
    <ul class="timeline">
        @foreach(\App\Models\Permissao::orderBy('nome')->get() as $permissao)
            <li>
                <div class="timeline-panel">
                    <div class="custom-control custom-checkbox checkbox-warning check-lg me-3">
                        <input type="checkbox"
                               class="custom-control-input"
                               id="usuario-{{$usuario->id}}-permissao-{{$permissao->id}}"
                               wire:click.prevent="salvarPermissoes('{{ $permissao->id }}', '{{ $usuario->permissoes->contains($permissao) }}')"
                               wire:loading.remove wire:target="salvarPermissoes('{{ $permissao->id }}', '{{ $usuario->permissoes->contains($permissao) }}')"
                            @checked($usuario->permissoes->contains($permissao))>
                        <i class="fa fa-spinner fa-spin" wire:loading wire:target="salvarPermissoes('{{ $permissao->id }}', '{{ $usuario->permissoes->contains($permissao) }}')"></i>
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
