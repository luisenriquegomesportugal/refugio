<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered table-hover style-1" id="refukids-chamada-presentes">
                <thead>
                <tr>
                    <th>
                        <b>Nome</b>
                    </th>
                    <th>
                        <b>Dt. Nascimento</b>
                    </th>
                    @if(\Carbon\Carbon::parse($turmaChamada->dia)->isCurrentDay())
                        <th>
                            <b>#</b>
                        </th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($membros as $membro)
                    <tr>
                        <td>
                            {{ $membro->nome }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($membro->nascimento)->format('d/m/Y') }}
                        </td>
                        @if(\Carbon\Carbon::parse($turmaChamada->dia)->isCurrentDay())
                            <td>
                                <div class="d-flex action-button">
                                    @if($turmaChamada->presentes->contains($membro))
                                        <a wire:click.prevent="removerPresenca({{$membro->id}})"
                                           class="btn btn-danger btn-xs light px-2">
                                            <i class="fa fa-trash me-2" wire:loading.remove
                                               wire:target="removerPresenca({{$membro->id}})"></i>
                                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                                               wire:target="removerPresenca({{$membro->id}})"></i>
                                            Remover
                                        </a>
                                    @else
                                        <a wire:click.prevent="cadastrarPresenca({{$membro->id}})"
                                           class="btn btn-success btn-xs light px-2">
                                            <i class="fa fa-check me-2" wire:loading.remove
                                               wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                                               wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                            Presente
                                        </a>
                                    @endif
                                </div>
                            </td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
