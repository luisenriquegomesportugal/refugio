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
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($membro->foto) }}"
                                             class="img-fluid default-modal-image-preview" alt="">
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
                                <div class="d-flex flex-column flex-sm-row align-items-end align-items-md-center justify-content-end action-button gap-2">
                                    <a wire:click.prevent="removerPresenca({{$membro->id}})"
                                       class="btn btn-success btn-xs light px-2 d-inline-flex align-items-center">
                                        <i class="fa fa-check me-2" wire:loading.remove
                                           wire:target="removerPresenca({{$membro->id}})"></i>
                                        <i class="fa fa-spinner fa-spin me-2" wire:loading
                                           wire:target="removerPresenca({{$membro->id}})"></i>
                                        Presente
                                    </a>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light btn-xs" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item text-danger" href="#">Atualizar foto</a>
                                            <a class="dropdown-item" href="#">Ver responsáveis</a>
                                        </div>
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
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($membro->foto) }}"
                                             class="img-fluid default-modal-image-preview" alt="">
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
                                <div class="d-flex flex-column flex-sm-row align-items-end align-items-md-center justify-content-end action-button gap-2">
                                    <a wire:click.prevent="cadastrarPresenca({{$membro->id}})"
                                       class="btn btn-danger btn-xs light px-2 d-inline-flex align-items-center">
                                        <i class="fa fa-spinner fa-spin me-2" wire:loading
                                           wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                        <i class="fa fa-times me-2" wire:loading.remove
                                           wire:target="cadastrarPresenca({{$membro->id}})"></i>
                                        Faltou
                                    </a>
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-light btn-xs" data-bs-toggle="dropdown">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item text-danger" href="#">Atualizar foto</a>
                                            <a class="dropdown-item" href="#">Ver responsáveis</a>
                                        </div>
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
                                        <img src="{{ \Illuminate\Support\Facades\Storage::url($membro->foto) }}"
                                             class="img-fluid default-modal-image-preview" alt="">
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
    </div>
</div>
