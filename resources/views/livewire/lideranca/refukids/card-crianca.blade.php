<div class="card m-0">
    <div class="project-info">
        <div class="col-lg-3 col-8 order-0 order-lg-0">
            <div class="d-flex align-items-center">
                <div class="project-media">
                    @if($membro->foto)
                        <img src="{{ route('download', ['file' => $membro->foto]) }}"
                             class="object-fit-cover" alt="">
                    @else
                        <span class="img-placeholder text-uppercase @if($membro->sexo == 'M') bgl-info text-info @else bgl-danger text-danger @endif">
                            {{ $membro->nome[0] }}{{ last(explode(' ', $membro->nome))[0] }}
                        </span>
                    @endif
                </div>
                <div class="ms-2">
                    <h5 class="mb-1 font-w500 text-black ellipsis-2">{{ $membro->nome }}</h5>
                    <span class="d-block">{{ $membro->sexo === 'M' ? 'Masculino' : 'Feminino' }}</span>
                    <span class="d-block">
                        {{ \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now()) }}
                        {{ \Illuminate\Support\Str::plural('ano', \Carbon\Carbon::parse($membro->nascimento)->diffInYears(\Carbon\Carbon::now())) }}
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-12 order-2 order-lg-1 mt-4 mt-lg-0">
            <div class="d-flex align-items-center">
                <div class="project-media list d-none d-sm-inline-flex order-1 order-sm-0 ms-2">
                    @foreach(\App\Models\RefukidsCrianca::find($membro->id)->responsaveis as $responsavel)
                        @if($responsavel->foto)
                            <img src="{{ route('download', ['file' => $responsavel->foto]) }}" alt="" title="{{ $responsavel->nome }}">
                        @else
                            <span class="img-placeholder text-uppercase @if($responsavel->sexo == 'M') bgl-info text-info @else bgl-danger text-danger @endif" title="{{ $responsavel->nome }}">
                            {{ $responsavel->nome[0] }}{{ last(explode(' ', $responsavel->nome))[0] }}
                        </span>
                        @endif
                    @endforeach
                </div>
                <div class="ms-0 ms-sm-2 order-0 order-sm-1">
                    <h5 class="mb-1 font-w500 text-black">Responsáveis</h5>
                    <ul>
                        @foreach(\App\Models\RefukidsCrianca::find($membro->id)->responsaveis as $responsavel)
                            <li>{{ current(explode(' ', $responsavel->nome)) }} {{ last(explode(' ', $responsavel->nome)) }} (<a href="tel:{{ str_replace('/[^\d]+/', '', $responsavel->telefone) }}">{{ $responsavel->telefone }}</a>)</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-sm-6 col-12 order-3 order-lg-2 mt-4 mt-lg-0">
            <div class="d-flex align-items-center">
                <div class="ms-0 ms-sm-2">
                    <h5 class="mb-1 font-w500 text-black">Observações/Alergias</h5>
                    <span class="d-block ellipsis-2" title="{{ ucfirst($membro->observacao ?? '') }}">
                        @if($membro->observacao)
                            {{ ucfirst($membro->observacao ?? '') }}
                        @else
                            Nenhuma
                            <br />
                            <br />
                        @endif
                    </span>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-4 @if($colunaAcao) order-5 @else order-1 @endif order-lg-3 mt-4 mt-lg-0">
            <div class="d-flex project-status @if($colunaAcao) justify-content-between @endif gap-3">
                @if($colunaAcao)
                    @livewire($colunaAcao, ['turma' => $turma, 'turmaChamada' => $turmaChamada, 'membro' => $membro], key($membro->id))
                @endif
                <div class="dropdown">
                    <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false" class="">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 13C12.5523 13 13 12.5523 13 12C13 11.4477 12.5523 11 12 11C11.4477 11 11 11.4477 11 12C11 12.5523 11.4477 13 12 13Z"
                                stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M12 6C12.5523 6 13 5.55228 13 5C13 4.44772 12.5523 4 12 4C11.4477 4 11 4.44772 11 5C11 5.55228 11.4477 6 12 6Z"
                                stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path
                                d="M12 20C12.5523 20 13 19.5523 13 19C13 18.4477 12.5523 18 12 18C11.4477 18 11 18.4477 11 19C11 19.5523 11.4477 20 12 20Z"
                                stroke="#575757" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" style="">
                        <a class="dropdown-item" href="javascript:void(0);">Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
