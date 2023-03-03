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
                        <b>Observações</b>
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
                    @foreach($turmaChamada->presentes as $membro)
                        <tr>
                            <td>
                                <div class="media align-items-center style-1">
                                    @if($membro->foto)
                                        <img src="{{ route('download', ['file' => $membro->foto]) }}"
                                             class="img-fluid default-modal-image-preview" alt=""
                                             style="width: 50px; height: 50px">
                                    @else
                                        <span
                                            class="icon-name text-uppercase @if($membro->sexo == 'M') bgl-info text-info @else bgl-danger text-danger @endif">
                                            {{ $membro->nome[0] }}{{ last(explode(' ', $membro->nome))[0] }}
                                        </span>
                                    @endif
                                    <div class="media-body ms-3">
                                        <h6>{{ $membro->nome }}</h6>
                                        <span>
                                            {{ \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now()) }}
                                            {{ \Illuminate\Support\Str::plural('ano', \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now())) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a title="{{ ucfirst($membro->observacao) }}">
                                    <p style="width: 100%; max-width: 550px;"
                                       class="ellipsis-2">{{ ucfirst($membro->observacao) }}</p>
                                </a>
                            </td>
                            <td>
                                <div class="btn-group pull-right">
                                    <button wire:click.prevent="removerPresenca({{$membro->id}})"
                                       class="btn btn-success btn-xs light px-2 d-inline-flex align-items-center">
                                        <i class="fa fa-check me-2" wire:loading.remove
                                           wire:target="removerPresenca({{$membro->id}})"></i>
                                        <i class="fa fa-spinner fa-spin me-2" wire:loading
                                           wire:target="removerPresenca({{$membro->id}})"></i>
                                        Presente
                                    </button>
                                    <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item text-danger" href="#" data-bs-toggle="modal"
                                           data-bs-target="#turma-chamada-presentes"
                                           wire:click.prevent="selecionarMembro({{$membro->id}})">Atualizar
                                            foto</a>
                                        <a class="dropdown-item" href="#">Ver responsáveis</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    @foreach($membros as $membro)
                        @unless($turmaChamada->presentes->contains($membro))
                            <tr>
                                <td>
                                    <div class="media align-items-center style-1">
                                        @if($membro->foto)
                                            <img src="{{ route('download', ['file' => $membro->foto]) }}"
                                                 class="img-fluid default-modal-image-preview" alt=""
                                                 style="width: 50px; height: 50px">
                                        @else
                                            <span
                                                class="icon-name text-uppercase @if($membro->sexo == 'M') bgl-info text-info @else bgl-danger text-danger @endif">
                                            {{ $membro->nome[0] }}{{ last(explode(' ', $membro->nome))[0] }}
                                        </span>
                                        @endif
                                        <div class="media-body ms-3">
                                            <h6>{{ $membro->nome }}</h6>
                                            <span>
                                            {{ \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now()) }}
                                                {{ \Illuminate\Support\Str::plural('ano', \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now())) }}
                                        </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a title="{{ ucfirst($membro->observacao) }}">
                                        <p style="width: 100%; max-width: 550px;"
                                           class="ellipsis-2">{{ ucfirst($membro->observacao) }}</p>
                                    </a>
                                </td>
                                <td>
                                    <div class="btn-group pull-right">
                                        <button wire:click.prevent="cadastrarPresenca({{$membro->id}})"
                                           class="btn btn-danger btn-xs light px-2 d-inline-flex align-items-center">
                                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                                               wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                            <i class="fa fa-times me-2" wire:loading.remove
                                               wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                            Faltou
                                        </button>
                                        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown"></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="#">Ver responsáveis</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endunless
                    @endforeach
                @else
                    @foreach($turmaChamada->presentes as $membro)
                        <tr>
                            <td>
                                <div class="media align-items-center style-1">
                                    @if($membro->foto)
                                        <img src="{{ route('download', ['file' => $membro->foto]) }}"
                                             class="img-fluid default-modal-image-preview" alt=""
                                             style="width: 50px; height: 50px">
                                    @else
                                        <span
                                            class="icon-name text-uppercase @if($membro->sexo == 'M') bgl-info text-info @else bgl-danger text-danger @endif">
                                            {{ $membro->nome[0] }}{{ last(explode(' ', $membro->nome))[0] }}
                                        </span>
                                    @endif
                                    <div class="media-body ms-3">
                                        <h6>{{ $membro->nome }}</h6>
                                        <span>
                                            {{ \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now()) }}
                                            {{ \Illuminate\Support\Str::plural('ano', \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now())) }}
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <a title="{{ ucfirst($membro->observacao) }}">
                                    <p style="width: 100%; max-width: 550px;"
                                       class="ellipsis-2">{{ ucfirst($membro->observacao) }}</p>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="turma-chamada-presentes" wire:ignore.self>
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Atualizar fotos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                        </button>
                    </div>
                    @if($membroSelecionado != null)
                        <div class="modal-body">
                            <label class="form-label fw-bold text-capitalize">{{ $membroSelecionado->nome }}</label>
                            <div class="d-flex align-items-center">
                                <div class="form-file me-2">
                                    <input type="file" class="form-file-input form-control ps-2"
                                           wire:model="fotos.{{$membroSelecionado->id}}">
                                </div>
                                <span wire:loading
                                      wire:target="fotos.{{$membroSelecionado->id}}">
                                    <i class="fa fa-spinner fa-spin"></i>
                                </span>
                            </div>
                            @foreach(\App\Models\RefukidsResponsavel::where('crianca_id', $membroSelecionado->id)->get() as $responsavel)
                                <div class="mt-4">
                                    <label
                                        class="form-label fw-bold text-capitalize">{{ $responsavel->nome }}</label>
                                    <div class="d-flex align-items-center">
                                        <div class="form-file me-2">
                                            <input type="file" class="form-file-input form-control ps-2"
                                                   wire:model="fotos.{{$responsavel->id}}">
                                        </div>
                                        <span wire:loading
                                              wire:target="fotos.{{$responsavel->id}}">
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="modal-body d-flex justify-content-center align-items-center">
                            <i class="fa fa-spinner fa-spin"></i>
                        </div>
                    @endif
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light light" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-success" wire:loading.attr="disabled" wire:target="fotos.*"
                                wire:click.prevent="salvarMembroSelecionado">
                            <i class="fa fa-spinner fa-spin me-2" wire:loading
                               wire:target="salvarMembroSelecionado"></i>
                            <i class="fa fa-check me-2" wire:loading.remove wire:target="salvarMembroSelecionado"></i>
                            Salvar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript" wire:ignore>
        (function ($) {
            $(document).on('hidden.bs.modal', '#turma-chamada-presentes', () => {
                Livewire.emit('turmaChamadaPresentesHidden');
            });

            Livewire.on('salvarMembroSelecionadoSucesso', () => {
                toastr.success("Imagens salvas com sucesso", "Sucesso", {
                    closeButton: true,
                    positionClass: "toast-top-right"
                });

                $('#turma-chamada-presentes').modal('hide');

            });
        })(jQuery);
    </script>
@endpush
