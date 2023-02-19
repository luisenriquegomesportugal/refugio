<div>
    @unless($turma->chamadas->contains('dia', \Carbon\Carbon::today()->toDateString()))
        <div class="row mb-4">
            <div class="col">
                <button wire:click="adicionarChamada" wire:loading.disabled class="btn btn-primary pull-right">
                    <i class="fas fa-spinner fa-spin" wire:loading></i>
                    <i class="fas fa-plus me-2" wire:loading.remove></i>
                    Nova chamada
                </button>
            </div>
        </div>
    @endunless
    <div class="row">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-hover style-1" id="chamada-refukids">
                    <thead>
                    <tr>
                        <th>
                            <b>Dia</b>
                        </th>
                        <th>
                            <b>Presentes</b>
                        </th>
                        <th>
                            <b>#</b>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($turma->chamadas()->paginate() as $chamada)
                        <tr>
                            <td>
                                @if(\Carbon\Carbon::parse($chamada->dia)->isCurrentDay())
                                    <b>Hoje</b>
                                @else
                                    {{ \Carbon\Carbon::parse($chamada->dia)->format('d/m/Y') }}
                                @endif
                            </td>
                            <td>
                                {{ $chamada->presentes->count() }} {{ \Illuminate\Support\Str::plural('criança', $chamada->presentes->count()) }}
                            </td>
                            <td>
                                <div class="d-flex action-button">
                                    @if(\Carbon\Carbon::parse($chamada->dia)->isCurrentDay())
                                        <a href="{{ route("lideranca.refukids.chamada.presentes", ["turma" => $turma->id, "turma_chamada" => $chamada->id]) }}"
                                           class="btn btn-success btn-xs px-2">
                                            <i class="fa fa-pen me-2"></i>
                                            <span class="d-none d-md-inline">Cadastrar presentes</span>
                                            <span class="d-inline d-md-none">Presentes</span>
                                        </a>
                                    @else
                                        <a href="{{ route("lideranca.refukids.chamada.presentes", ["turma" => $turma->id, "turma_chamada" => $chamada->id]) }}"
                                           class="btn btn-outline-info btn-xs light px-2">
                                            <i class="fa fa-folder-open me-2"></i>
                                            <span class="d-none d-md-inline">Visualizar presentes</span>
                                            <span class="d-inline d-md-none">Presentes</span>

                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $turma->chamadas()->paginate()->links('pagination::simple-default') }}
            </div>
        </div>
    </div>
</div>
