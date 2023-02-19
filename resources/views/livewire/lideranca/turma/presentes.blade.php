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
                    <th>
                        <b>#</b>
                    </th>
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
                        <td>
                            <div class="d-flex action-button">
                                @if($turmaChamada->presentes->contains($membro))
                                    <a wire:click.prevent="removerPresenca({{$membro->id}})"
                                       class="btn btn-danger btn-xs light px-2">
                                            <span wire:loading.remove>
                                                <i class="fa fa-remove me-2"></i> Remover
                                            </span>
                                        <span wire:loading>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </span>
                                    </a>
                                @else
                                    <a wire:click.prevent="cadastrarPresenca({{$membro->id}})"
                                       class="btn btn-success btn-xs light px-2">
                                            <span wire:loading.remove>
                                                <i class="fa fa-check me-2"></i> Presente
                                            </span>
                                        <span wire:loading>
                                                <i class="fa fa-spinner fa-spin"></i>
                                            </span>
                                    </a>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
