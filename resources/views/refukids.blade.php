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
                <div class="row row-30 row-md-60 justify-content-between">
                    <div class="col-12 col-md-6">
                        <h4 class="mb-2">Criança</h4>
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
                            <label for="cadastro-celula">Célula</label>
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
                            <label for="cadastro-name">Nome</label>
                            <input class="form-input" id="cadastro-name" type="text" name="crianca[nome]"
                             value="{{ old('crianca.nome') }}" />
                            @error('crianca.nome')
                                <span class="form-validation">{{ $errors->first('crianca.nome') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap @error('crianca.sexo') has-error @enderror">
                            <label for="cadastro-sexo">Sexo</label>
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
                            <label for="cadastro-nascimento">Data de nascimento</label>
                            <input class="form-input" id="cadastro-nascimento" type="date"
                                name="crianca[nascimento]" value="{{ old('crianca.nascimento') }}" />
                            @error('crianca.nascimento')
                                <span class="form-validation">{{ $errors->first('crianca.nascimento') }}</span>
                            @enderror
                        </div>
                        <div class="form-wrap">
                            <label for="cadastro-observacao">Observações</label>
                            <textarea class="form-input" id="cadastro-observacao" name="crianca[observacao]"
                                placeholder="Cuidados, alergias, alimentação etc...">{{ old('crianca.observacao') }}</textarea>
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
                        <div class="d-flex justify-content-between align-items-center mt-4 mb-3">
                            <div>
                                <h4>Responsáveis</h4>
                                @error('responsavel')
                                    <span class="error-responsavel text-danger fs-6">{{ $errors->first('responsavel') }}</span>
                                @enderror
                            </div>
                            <button class="button button-primary button-sm mt-0" type="button"
                                id="responsavel-tabela-novo">Inserir responsável</button>
                        </div>
                        <table class="table w-100" id="tabela-responsaveis">
                            <thead>
                                <tr>
                                    <th scope="col">Foto</th>
                                    <th scope="col">Célula</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Sexo</th>
                                    <th scope="col">Data de Nascimento</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider" id="responsavel-linha-lista">
                                @if (!empty(old('responsavel', [])))
                                    @foreach (old('responsavel', []) as $index => $responsavel)
                                        <tr class="responsavel-{{ $index }}">
                                            <td>
                                                <div class="form-wrap">
                                                    <label class="form-input"
                                                        for="responsavel-{{ $index }}-cadastro-foto">
                                                        <input class="d-none"
                                                            id="responsavel-{{ $index }}-cadastro-foto"
                                                            type="file" name="responsavel[{{ $index }}][foto]"
                                                            accept="image/jpeg,image/jpg,image/png">
                                                    </label>
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-wrap @error("responsavel.{$index}.celula_id") has-error @enderror">
                                                    <select class="form-input"
                                                        id="responsavel-{{ $index }}-cadastro-celula"
                                                        name="responsavel[{{ $index }}][celula_id]" id="celula">
                                                        <option value="" disabled @selected(!$responsavel['celula_id'])>Selecione</option>
                                                        @foreach ($redes as $rede)
                                                            <optgroup label="{{ $rede->nome }}">
                                                                @foreach ($rede->celulas as $celula)
                                                                    <option value="{{ $celula->id }}"
                                                                        @selected($responsavel['celula_id'] == $celula->id)>
                                                                        {{ $celula->nome }}
                                                                    </option>
                                                                @endforeach
                                                            </optgroup>
                                                        @endforeach
                                                    </select>
                                                    @error("responsavel.{$index}.celula_id")
                                                        <span
                                                            class="form-validation">{{ $errors->first("responsavel.{$index}.celula_id") }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-wrap @error("responsavel.{$index}.nome") has-error @enderror">
                                                    <input class="form-input"
                                                        id="responsavel-{{ $index }}-cadastro-name" type="text"
                                                        name="responsavel[{{ $index }}][nome]"
                                                        value="{{ $responsavel['nome'] }}" />
                                                    @error("responsavel.{$index}.nome")
                                                        <span
                                                            class="form-validation">{{ $errors->first("responsavel.{$index}.nome") }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-wrap @error("responsavel.{$index}.sexo") has-error @enderror">
                                                    <select class="form-input"
                                                        id="responsavel-{{ $index }}-cadastro-sexo"
                                                        name="responsavel[{{ $index }}][sexo]">
                                                        <option value="" disabled @selected(!$responsavel['sexo'])>Selecione</option>
                                                        @foreach (['M' =>'Masculino', 'F' => 'Feminino'] as $sexo => $labelSexo)
                                                            <option value="{{ $sexo }}"
                                                                @selected($responsavel['sexo'] == $sexo)>
                                                                {{ $labelSexo }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error("responsavel.{$index}.sexo")
                                                        <span
                                                            class="form-validation">{{ $errors->first("responsavel.{$index}.sexo") }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-wrap @error("responsavel.{$index}.nascimento") has-error @enderror">
                                                    <input class="form-input"
                                                        id="responsavel-{{ $index }}-cadastro-nascimento"
                                                        name="responsavel[{{ $index }}][nascimento]"
                                                        type="date" value="{{ $responsavel['nascimento'] }}" />
                                                    @error("responsavel.{$index}.nascimento")
                                                        <span
                                                            class="form-validation">{{ $errors->first("responsavel.{$index}.nascimento") }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td>
                                                <div
                                                    class="form-wrap @error("responsavel.{$index}.telefone") has-error @enderror">
                                                    <input class="form-input"
                                                        id="responsavel-{{ $index }}-cadastro-telefone" type="tel"
                                                        name="responsavel[{{ $index }}][telefone]" value="{{ $responsavel['telefone'] }}" />
                                                    @error("responsavel.{$index}.telefone")
                                                        <span
                                                            class="form-validation">{{ $errors->first("responsavel.{$index}.telefone") }}</span>
                                                    @enderror
                                                </div>
                                            </td>
                                            <td style="vertical-align: middle">
                                                <i
                                                    class="mdi mdi-24px mdi-close deleta-linha-tabela-responsavel cursor-pointer"></i>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
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
    <script id="responsavel-linha-template" type="text/html">
        <tr class="responsavel-INDEX_LINHA">
			<td>
				<div class="form-wrap">
					<label class="form-input" for="responsavel-INDEX_LINHA-cadastro-foto">
                        <span></span>
                        <input class="d-none" id="responsavel-INDEX_LINHA-cadastro-foto" type="file" name="responsavel[INDEX_LINHA][foto]" accept="image/jpeg,image/jpg,image/png">
					</label>
				</div>
			</td>
			<td>
				<div class="form-wrap">
					<select class="form-input" id="responsavel-INDEX_LINHA-cadastro-celula" name="responsavel[INDEX_LINHA][celula_id]"
						id="celula">
						<option value="" disabled selected>Selecione</option>
						@foreach ($redes as $rede)
							<optgroup label="{{ $rede->nome }}">
								@foreach ($rede->celulas as $celula)
									<option value="{{ $celula->id }}">{{ $celula->nome }}
									</option>
								@endforeach
							</optgroup>
						@endforeach
					</select>
				</div>
			</td>
			<td>
				<div class="form-wrap">
					<input class="form-input" id="responsavel-INDEX_LINHA-cadastro-name" type="text" name="responsavel[INDEX_LINHA][nome]" />
				</div>
			</td>
			<td>
				<div class="form-wrap">
					<select class="form-input" id="responsavel-INDEX_LINHA-cadastro-sexo" name="responsavel[INDEX_LINHA][sexo]">
						<option value="" disabled selected>Selecione</option>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
					</select>
				</div>
			</td>
			<td>
				<div class="form-wrap">
					<input class="form-input" id="responsavel-INDEX_LINHA-cadastro-nascimento" name="responsavel[INDEX_LINHA][nascimento]" type="date" />
				</div>
			</td>
			<td>
				<div class="form-wrap">
					<input class="form-input" id="responsavel-INDEX_LINHA-cadastro-telefone"
						type="tel" name="responsavel[INDEX_LINHA][telefone]" />
				</div>
			</td>
			<td style="vertical-align: middle">
				<i class="mdi mdi-24px mdi-close deleta-linha-tabela-responsavel cursor-pointer"></i>
			</td>
		</tr>
    </script>
@endsection
