@extends('layouts.site')
@section('titulo', 'Inicio')

@section('conteudo')
    <!-- Swiper-->
    <section class="section swiper-container swiper-slider swiper-slider-2" data-loop data-autoplay="4500"
        data-simulate-touch="false" data-slide-effect="fade">
        <div class="swiper-wrapper">
            <div class="swiper-slide context-dark" data-slide-bg="images/bg-3-1920x1000.jpg">
                <div class="swiper-slide-caption">
                    <div class="container">
                        <div class="row justify-content-lg-left">
                            <div class="col-md-12 col-xl-10">
                                <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Culto Refúgio</h1>
                                <h4 data-caption-animate="fadeInUp" data-caption-delay="150">Domingo, 20 hrs</h4>
                                <div data-caption-animate="fadeInUp" data-caption-delay="200" class="line"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide context-dark" data-slide-bg="images/bg-refukids.jpg">
                <div class="swiper-slide-caption">
                    <div class="container">
                        <div class="row justify-content-lg-left">
                            <div class="col-md-12 col-xl-10">
                                <h1 data-caption-animate="fadeInUp" data-caption-delay="100">
                                    Refukids
                                </h1>
                                <a class="button button-primary" href="{{ route('refukids.cadastro') }}" data-caption-animate="fadeInUp"
                                    data-caption-delay="450">Faça o cadastro de seu filho</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-meta">
            <ul class="links">
                <li><a class="icon icon-meta mdi mdi-instagram" target="_blank"
                        href="https://www.instagram.com/refugio_lifestyle"></a></li>
                <li><a class="icon icon-meta mdi mdi-youtube-play" target="_blank"
                        href="https://www.youtube.com/@refugiolifestyle"></a></li>
                <li><a class="icon icon-meta mdi mdi-spotify" target="_blank"
                        href="https://open.spotify.com/show/2YJ3HxRyWu6e36K5f29j20"></a></li>
            </ul>
        </div>
    </section>
@endsection
