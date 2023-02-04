@extends('layouts.site')
@section('titulo', 'Refukids')

@section('conteudo')
    <!-- Breadcrumbs -->
    <section class="section section-bredcrumbs shadow"
        style="background: linear-gradient(#000000DD 20%, #00000088 100%), url(images/breadcrumbs-1920x440.jpg) no-repeat center / cover;">
        <div class="container context-dark breadcrumb-wrapper text-left">
            <h1>Refukids</h1>
            <div class="line"></div>
        </div>
    </section>
    <!-- Form -->
    <section class="section section-lg bg-default">
        <form method="post" action="{{ route('refukids') }}" target="_self" enctype="multipart/form-data"
            class="needs-validation" novalidate>
            @csrf
            <div class="container relative-container">
                <div class="row row-30 row-md-60 justify-content-between">
                    <div class="col-md-12">
                        <h2>Cadastro infantil</h2>
                        @if ($errors->has('exception'))
                            <div class="alert alert-warning d-flex align-items-center my-2" role="alert">
                                <i class="mdi mdi-24px mdi-close me-2"></i>
                                <div>
                                    {{ $errors->first('exception') }}
                                </div>
                            </div>
                        @endif
                        @if (session()->has('refukids-cadastro-sucesso'))
                            <div class="alert alert-success d-flex align-items-center my-2" role="alert">
                                <i class="mdi mdi-24px mdi-check me-2"></i>
                                <div>
                                    Cadastro feito com sucesso
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="d-flex flex-column-reverse flex-md-row">
                    <div class="col-12 col-md-6">
                        <h4 class="my-0 mt-md-4 mb-md-2">Criança</h4>
                        <div class="form-wrap @error('crianca.foto') has-error @enderror">
                            <label for="cadastro-foto">Foto</label>
                            <label class="form-input" for="cadastro-foto">
                                <input class="d-none" id="cadastro-foto" type="file" name="crianca[foto]"
                                    accept="image/jpeg,image/jpg,image/png" />
                            </label>
                            @error('crianca.foto')
                                <span class="form-validation">{{ $errors->first('crianca.foto') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.celula_id') has-error @enderror">
                            <label for="cadastro-celula">Célula *</label>
                            <select class="form-input" id="cadastro-celula" name="crianca[celula_id]" id="celula">
                                <option value="" selected disabled>Selecione</option>
                                @foreach ($redes as $rede)
                                    <optgroup label="{{ $rede->nome }}">
                                        @foreach ($rede->celulas as $celula)
                                            <option value="{{ $celula->id }}" @selected(old('crianca.celula_id') == $celula->id)>
                                                {{ $celula->nome }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('crianca.celula_id')
                                <span class="form-validation">{{ $errors->first('crianca.celula_id') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.nome') has-error @enderror">
                            <label for="cadastro-name">Nome *</label>
                            <input class="form-input" id="cadastro-name" type="text" name="crianca[nome]"
                                value="{{ old('crianca.nome') }}" />
                            @error('crianca.nome')
                                <span class="form-validation">{{ $errors->first('crianca.nome') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.sexo') has-error @enderror">
                            <label for="cadastro-sexo">Sexo *</label>
                            <select class="form-input" id="cadastro-sexo" name="crianca[sexo]" id="sexo">
                                <option value="" selected disabled>Selecione</option>
                                <option value="M" @selected(old('crianca.sexo') == 'M')>Masculino</option>
                                <option value="F" @selected(old('crianca.sexo') == 'F')>Feminino</option>
                            </select>
                            @error('crianca.sexo')
                                <span class="form-validation">{{ $errors->first('crianca.sexo') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.nascimento') has-error @enderror">
                            <label for="cadastro-nascimento">Data de nascimento *</label>
                            <input class="form-input" id="cadastro-nascimento" type="date" name="crianca[nascimento]"
                                value="{{ old('crianca.nascimento') }}" />
                            @error('crianca.nascimento')
                                <span class="form-validation">{{ $errors->first('crianca.nascimento') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap">
                            <label for="cadastro-observacao">Observações</label>
                            <textarea class="form-input" id="cadastro-observacao" name="crianca[observacao]"
                                placeholder="Cuidados, alergias, alimentação etc...">{{ old('crianca.observacao') }}</textarea>
                        </div>
                        <div class="form-wrap mt-4 mb-3">
                            <div>
                                <h4>Responsáveis</h4>
                                @error('responsavel')
                                    <span class="error-responsavel text-danger fs-6">{{ $errors->first('responsavel') }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="responsavel-novo mb-4 responsavel-0">
                            <div class="form-wrap d-flex justify-content-between align-items-center">
                                <span>Responsável 1</span>
                            </div>
                            <div class="form-wrap">
                                <label for="responsavel-0-cadastro-foto">Foto</label>
                                <label class="form-input" for="responsavel-0-cadastro-foto">
                                    <input class="d-none" id="responsavel-0-cadastro-foto"
                                        type="file" name="responsavel[0][foto]"
                                        accept="image/jpeg,image/jpg,image/png">
                                </label>
                            </div>
                            <div
                                class="form-wrap @error("responsavel.0.celula_id") has-error @enderror">
                                <label for="responsavel-0-cadastro-celula">Célula *</label>
                                <select class="form-input" id="responsavel-0-cadastro-celula"
                                    name="responsavel[0][celula_id]" id="celula">
                                    <option value="" disabled @selected(old("responsavel.0.celula_id", null) == null)>Selecione</option>
                                    @foreach ($redes as $rede)
                                        <optgroup label="{{ $rede->nome }}">
                                            @foreach ($rede->celulas as $celula)
                                                <option value="{{ $celula->id }}" @selected(old("responsavel.0.celula_id", null) == $celula->id)>
                                                    {{ $celula->nome }}
                                                </option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                                @error("responsavel.0.celula_id")
                                    <span
                                        class="form-validation">{{ $errors->first("responsavel.0.celula_id") }}</span>
                                @enderror
                            </div>
                            <div
                                class="form-wrap @error("responsavel.0.nome") has-error @enderror">
                                <label for="responsavel-0-cadastro-name">Nome *</label>
                                <input class="form-input" id="responsavel-0-cadastro-name"
                                    type="text" name="responsavel[0][nome]"
                                    value="{{ old("responsavel.0.nome") }}" />
                                @error("responsavel.0.nome")
                                    <span
                                        class="form-validation">{{ $errors->first("responsavel.0.nome") }}</span>
                                @enderror
                            </div>
                            <div
                                class="form-wrap @error("responsavel.0.sexo") has-error @enderror">
                                <label for="responsavel-0-cadastro-sexo">Sexo *</label>
                                <select class="form-input" id="responsavel-0-cadastro-sexo"
                                    name="responsavel[0][sexo]">
                                    <option value="" disabled @selected(old("responsavel.0.sexo", null) == null)>Selecione</option>
                                    <option value="M" @selected(old("responsavel.0.sexo", null) == "M")>Masculino</option>
                                    <option value="F" @selected(old("responsavel.0.sexo", null) == "F")>Feminino</option>
                                </select>
                                @error("responsavel.0.sexo")
                                    <span
                                        class="form-validation">{{ $errors->first("responsavel.0.sexo") }}</span>
                                @enderror
                            </div>
                            <div
                                class="form-wrap @error("responsavel.0.nascimento") has-error @enderror">
                                <label for="responsavel-0-cadastro-nascimento">Data de
                                    nascimento *</label>
                                <input class="form-input"
                                    id="responsavel-0-cadastro-nascimento"
                                    name="responsavel[0][nascimento]" type="date"
                                    value="{{ old("responsavel.0.nascimento") }}" />
                                @error("responsavel.0.nascimento")
                                    <span
                                        class="form-validation">{{ $errors->first("responsavel.0.nascimento") }}</span>
                                @enderror
                            </div>
                            <div
                                class="form-wrap @error("responsavel.0.telefone") has-error @enderror">
                                <label
                                    for="responsavel-0-cadastro-telefone">Telefone *</label>
                                <input class="form-input"
                                    id="responsavel-0-cadastro-telefone" type="tel"
                                    name="responsavel[0][telefone]"
                                    value="{{ old("responsavel.0.telefone") }}" />
                                @error("responsavel.0.telefone")
                                    <span
                                        class="form-validation">{{ $errors->first("responsavel.0.telefone") }}</span>
                                @enderror
                            </div>
                        </div>
                        @if(!old('responsavel') || old('responsavel') && count(old('responsavel', [])) > 1)
                            <div class="responsavel-novo mb-4 responsavel-1">
                                <div class="form-wrap d-flex justify-content-between align-items-center">
                                    <span>Responsável 2</span>
                                    <div class="deleta-linha-tabela-responsavel">
                                        <i class="mdi mdi-24px mdi-close mr-2 cursor-pointer"></i>
                                        Apagar 2º responsável
                                    </div>
                                </div>
                                <div class="form-wrap">
                                    <label for="responsavel-1-cadastro-foto">Foto</label>
                                    <label class="form-input" for="responsavel-1-cadastro-foto">
                                        <input class="d-none" id="responsavel-1-cadastro-foto"
                                            type="file" name="responsavel[1][foto]"
                                            accept="image/jpeg,image/jpg,image/png">
                                    </label>
                                </div>
                                <div
                                    class="form-wrap @error("responsavel.1.celula_id") has-error @enderror">
                                    <label for="responsavel-1-cadastro-celula">Célula *</label>
                                    <select class="form-input" id="responsavel-1-cadastro-celula"
                                        name="responsavel[1][celula_id]" id="celula">
                                        <option value="" disabled @selected(old("responsavel.1.celula_id", null) == null)>Selecione</option>
                                        @foreach ($redes as $rede)
                                            <optgroup label="{{ $rede->nome }}">
                                                @foreach ($rede->celulas as $celula)
                                                    <option value="{{ $celula->id }}" @selected(old("responsavel.1.celula_id", null) == $celula->id)>
                                                        {{ $celula->nome }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                    @error("responsavel.1.celula_id")
                                        <span
                                            class="form-validation">{{ $errors->first("responsavel.1.celula_id") }}</span>
                                    @enderror
                                </div>
                                <div
                                    class="form-wrap @error("responsavel.1.nome") has-error @enderror">
                                    <label for="responsavel-1-cadastro-name">Nome *</label>
                                    <input class="form-input" id="responsavel-1-cadastro-name"
                                        type="text" name="responsavel[1][nome]"
                                        value="{{ old("responsavel.1.nome") }}" />
                                    @error("responsavel.1.nome")
                                        <span
                                            class="form-validation">{{ $errors->first("responsavel.1.nome") }}</span>
                                    @enderror
                                </div>
                                <div
                                    class="form-wrap @error("responsavel.1.sexo") has-error @enderror">
                                    <label for="responsavel-1-cadastro-sexo">Sexo *</label>
                                    <select class="form-input" id="responsavel-1-cadastro-sexo"
                                        name="responsavel[1][sexo]">
                                        <option value="" disabled @selected(old("responsavel.1.sexo", null) == null)>Selecione</option>
                                        <option value="M" @selected(old("responsavel.1.sexo", null) == "M")>Masculino</option>
                                        <option value="F" @selected(old("responsavel.1.sexo", null) == "F")>Feminino</option>
                                    </select>
                                    @error("responsavel.1.sexo")
                                        <span
                                            class="form-validation">{{ $errors->first("responsavel.1.sexo") }}</span>
                                    @enderror
                                </div>
                                <div
                                    class="form-wrap @error("responsavel.1.nascimento") has-error @enderror">
                                    <label for="responsavel-1-cadastro-nascimento">Data de
                                        nascimento *</label>
                                    <input class="form-input"
                                        id="responsavel-1-cadastro-nascimento"
                                        name="responsavel[1][nascimento]" type="date"
                                        value="{{ old("responsavel.1.nascimento") }}" />
                                    @error("responsavel.1.nascimento")
                                        <span
                                            class="form-validation">{{ $errors->first("responsavel.1.nascimento") }}</span>
                                    @enderror
                                </div>
                                <div
                                    class="form-wrap @error("responsavel.1.telefone") has-error @enderror">
                                    <label
                                        for="responsavel-1-cadastro-telefone">Telefone *</label>
                                    <input class="form-input"
                                        id="responsavel-1-cadastro-telefone" type="tel"
                                        name="responsavel[1][telefone]"
                                        value="{{ old("responsavel.1.telefone") }}" />
                                    @error("responsavel.1.telefone")
                                        <span
                                            class="form-validation">{{ $errors->first("responsavel.1.telefone") }}</span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="d-flex align-items-center justify-content-start">
                            <button class="button button-primary" type="submit">Cadastrar</button>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 mb-4 mb-md-0 offset-0 offset-md-1 position-relative">
                        <img class="position-absolute" style="top: 0; right: -250px; scale: 1.4; opacity: 0.2;"
                            src="{{ asset('images/refukids-shape.svg') }}" alt="">
                        <p class="text-justify">Olá! Bem vindos! Estamos iniciando um novo tempo na Refukids. Nosso dever e
                            anseio é levar cada criança a viver o propósito eterno de Deus em suas vidas. </p>
                        <p class="text-justify">Entendendo a importância desse ministério, estamos nos equipando e
                            melhorando a
                            nossa estrutura para a melhor segurança e acompanhamento das nossas crianças, por isso todas
                            terão
                            um cadastro individual. </p>
                        <p class="text-justify">
                            Teremos 4 salas separadas e as crianças serão direcionadas de acordo com a sua faixa etária, que
                            vai
                            desde 02 anos até 12 anos de idade.
                        </p>
                        <p class="text-justify">
                        <ul>
                            <li>Refubabys ( 2 à 3 anos) - Templo novo</li>
                            <li>Refukids 1 ( 4 à 6 anos) - Templo antigo</li>
                            <li>Refukids 2 ( 7 à 9 anos) - Templo antigo</li>
                            <li>Refuteens ( 10 à 12 anos) - Templo antigo</li>
                        </ul>
                        </p>
                        <p class="text-justify">As Refukids 1 e 2, e Refuteens serão no templo antigo e os responsáveis
                            irão
                            deixar as crianças nas salas antes de se direcionar ao culto. Exceto a Refubaby que permanece no
                            templo novo e com o mesmo sistema de entrega das crianças, durante o louvor.</p>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
