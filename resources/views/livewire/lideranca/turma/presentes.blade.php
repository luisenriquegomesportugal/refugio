<div class="row">
    <div class="col">
        <div class="table-responsive">
            <table class="table table-bordered table-hover style-1" id="refukids-chamada-presentes">
                <thead>
                <tr>
                    <th>
                        #
                    </th>
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
                @if(\Carbon\Carbon::parse($turmaChamada->dia)->isCurrentDay())
                    @foreach($membros as $membro)
                        <tr>
                            <td>
                                {{ $loop->iteration }}
                            </td>
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
                                           class="btn btn-success btn-xs light px-2">
                                            <i class="fa fa-check me-2" wire:loading.remove
                                               wire:target="removerPresenca({{$membro->id}})"></i>
                                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                                               wire:target="removerPresenca({{$membro->id}})"></i>
                                            Presente
                                        </a>
                                    @else
                                        <a wire:click.prevent="cadastrarPresenca({{$membro->id}})"
                                           class="btn btn-danger btn-xs light px-2">
                                            <i class="fa fa-times me-2" wire:loading.remove
                                               wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                                               wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                            Faltou
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @foreach($turmaChamada->presentes as $membro)
                        <tr>
                            <td>
                                {{ $membro->nome }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($membro->nascimento)->format('d/m/Y') }}
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
