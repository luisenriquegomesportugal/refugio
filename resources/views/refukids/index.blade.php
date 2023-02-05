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
        <div class="container relative-container">
            <div class="row row-30 row-md-60 justify-content-between">
                <div class="col-md-12">
                    <h2>Listagem da Refukids</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="refukids">
                        <thead>
                            <tr>
                                <th scope="col">Criança</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Nascimento</th>
                                <th scope="col">1º responsavel</th>
                                <th scope="col">Célula</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">2º responsavel</th>
                                <th scope="col">Célula</th>
                                <th scope="col">Telefone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($refukids as $crianca)
                            <tr>
                                <td>{{$crianca->first()->crianca->nome}}</td>
                                <td>{{$crianca->first()->crianca->sexo}}</td>
                                <td>{{$crianca->first()->crianca->nascimento}}</td>
                                <td>{{$crianca->first()->responsavel->first()->nome}}</td>
                                <td>{{$crianca->first()->responsavel->first()->celula->nome}}</td>
                                <td>{{$crianca->first()->responsavel->first()->telefone}}</td>
                                <td>{{$crianca->last()->responsavel->first()->nome}}</td>
                                <td>{{$crianca->last()->responsavel->first()->celula->nome}}</td>
                                <td>{{$crianca->last()->responsavel->first()->telefone}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
