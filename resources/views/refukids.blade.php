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
                                    {{$errors->first('exception')}}
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
                <div class="row row-30 row-md-60 justify-content-between">
                    <div class="col-12 col-md-6">
                        <h4 class="mb-2">Criança</h4>
                        <div class="form-wrap @error('crianca.foto') has-error @enderror">
                            <label class="form-input" for="cadastro-foto">
                                <input class="d-none" id="cadastro-foto" type="file" name="crianca[foto]"
                                    accept="image/jpeg,image/jpg,image/png" placeholder="Foto" value="{{ old('crianca.foto') }}" />
                            </label>
                            @error('crianca.foto')
                                <span class="form-validation">{{ $errors->first('crianca.foto') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.celula_id') has-error @enderror">
                            <select class="form-input" id="cadastro-celula" name="crianca[celula_id]" id="celula">
                                <option value="" disabled selected>Célula</option>
                                @foreach ($redes as $rede)
                                    <optgroup label="{{ $rede->nome }}">
                                        @foreach ($rede->celulas as $celula)
                                            <option value="{{ $celula->id }}" @selected(old('crianca.celula_id') == $celula->id)>{{ $celula->nome }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('crianca.celula_id')
                                <span class="form-validation">{{ $errors->first('crianca.celula_id') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.nome') has-error @enderror">
                            <input class="form-input" id="cadastro-name" type="text" name="crianca[nome]"
                                placeholder="Nome" value="{{ old('crianca.nome') }}" />
                            @error('crianca.nome')
                                <span class="form-validation">{{ $errors->first('crianca.nome') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.sexo') has-error @enderror">
                            <select class="form-input" id="cadastro-sexo" name="crianca[sexo]" id="sexo">
                                <option value="" disabled selected>Sexo</option>
                                <option value="M" @selected(old('crianca.sexo') == 'M')>Masculino</option>
                                <option value="F" @selected(old('crianca.sexo') == 'F')>Feminino</option>
                            </select>
                            @error('crianca.sexo')
                                <span class="form-validation">{{ $errors->first('crianca.sexo') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.nascimento') has-error @enderror">
                            <input class="form-input" id="cadastro-nascimento" type="date" name="crianca[nascimento]"
                                placeholder="Data de nascimento" value="{{ old('crianca.nascimento') }}" />
                            @error('crianca.nascimento')
                                <span class="form-validation">{{ $errors->first('crianca.nascimento') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap">
                            <textarea class="form-input" id="cadastro-observacao" name="crianca[observacao]"
                                placeholder="Cuidados, alergias, alimentação etc..." value="{{ old('crianca.observacao') }}"></textarea>
                        </div>
                        <h4 class="mt-4 mb-3">Responsável</h4>
                        <div class="form-wrap @error('responsavel.foto') has-error @enderror">
                            <label class="form-input" for="responsavel-cadastro-foto">
                                <input class="d-none" id="responsavel-cadastro-foto" type="file" name="responsavel[foto]"
                                    accept="image/jpeg,image/jpg,image/png" placeholder="Foto" value="{{ old('responsavel.foto') }}" />
                            </label>
                            @error('responsavel.foto')
                                <span class="form-validation">{{ $errors->first('responsavel.foto') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('responsavel.celula_id') has-error @enderror">
                            <select class="form-input" id="responsavel-cadastro-celula" name="responsavel[celula_id]"
                                id="celula">
                                <option value="" disabled selected>Célula</option>
                                @foreach ($redes as $rede)
                                    <optgroup label="{{ $rede->nome }}">
                                        @foreach ($rede->celulas as $celula)
                                            <option value="{{ $celula->id }}" @selected(old('responsavel.celula_id') == $celula->id)>{{ $celula->nome }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                            @error('responsavel.celula_id')
                                <span class="form-validation">{{ $errors->first('responsavel.celula_id') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('responsavel.nome') has-error @enderror">
                            <input class="form-input" id="responsavel-cadastro-name" type="text" name="responsavel[nome]"
                                placeholder="Nome" value="{{ old('responsavel.nome') }}" />
                            @error('responsavel.nome')
                                <span class="form-validation">{{ $errors->first('responsavel.nome') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('responsavel.sexo') has-error @enderror">
                            <select class="form-input" id="responsavel-cadastro-sexo" name="responsavel[sexo]"
                                id="sexo">
                                <option value="" disabled selected>Sexo</option>
                                <option value="M" @selected(old('responsavel.sexo') == 'M')>Masculino</option>
                                <option value="F" @selected(old('responsavel.sexo') == 'F')>Feminino</option>
                            </select>
                            @error('responsavel.sexo')
                                <span class="form-validation">{{ $errors->first('responsavel.sexo') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('responsavel.nascimento') has-error @enderror">
                            <input class="form-input" id="responsavel-cadastro-nascimento" type="text"
                                onfocus="this.type = 'date'" onblur="this.type = this.value ? 'date' : 'text'"
                                name="responsavel[nascimento]" placeholder="Data de nascimento" value="{{ old('responsavel.nascimento') }}" />
                            @error('responsavel.nascimento')
                                <span class="form-validation">{{ $errors->first('responsavel.nascimento') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('responsavel.telefone') has-error @enderror">
                            <input class="form-input" id="responsavel-cadastro-telefone" type="tel"
                                name="responsavel[telefone]" placeholder="Telefone" value="{{ old('responsavel.telefone') }}" />
                            @error('responsavel.telefone')
                                <span class="form-validation">{{ $errors->first('responsavel.telefone') }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-md-5 offset-0 offset-md-1 position-relative">
                        <img class="position-absolute" style="top: 0; right: -250px; scale: 1.6; opacity: 0.2;"
                            src="{{ asset('images/refukids-shape.svg') }}" alt="">
                        <p class="text-justify">Olá! Bem vindos! Estamos iniciando um novo tempo na Refukids. Nosso dever e
                            anseio é levar cada criança a viver o propósito eterno de Deus em suas vidas. </p>
                        <p class="text-justify">Entendendo a importância desse ministério, estamos NOS equipando e
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
                <div class="row row-30 row-md-60 justify-content-between">
                    <div class="col-12">
                        <button class="button button-primary" type="submit">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
