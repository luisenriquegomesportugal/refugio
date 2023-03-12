@extends('layouts.portal')
@section('titulo', 'Refukids')

@section('conteudo')
    <!-- Breadcrumbs -->
    <section class="section section-bredcrumbs shadow"
        style="background: linear-gradient(#000000DD 20%, #00000088 100%), url(assets/portal/images/breadcrumbs-1920x440.jpg) no-repeat center / cover;">
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
                    <table class="table table-borderless">
                        <tbody>
                            @foreach ($refukids as $crianca)
                            <tr>
                                <td>
                                    @livewire('lideranca.refukids.card-crianca', ['membro' => $membro], key($membro->id))
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $refukids->links('pagination::default') !!}
                </div>
            </div>
        </div>
    </section>
@endsection
