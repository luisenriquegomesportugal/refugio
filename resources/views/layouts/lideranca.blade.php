<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <META name="robots" content="noindex,nofollow">
    <title>@yield('titulo') :: Liderança :: Refúgio Lifestyle</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("/assets/lideranca/images/favicon.png") }}">
    <link href="{{ asset("/assets/lideranca/vendor/bootstrap-select/dist/css/bootstrap-select.min.css") }}"
          rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("/assets/lideranca/vendor/toastr/css/toastr.min.css") }}">
    <link href="{{ asset("/assets/lideranca/vendor/owl-carousel/owl.carousel.css") }}" rel="stylesheet">
    <link href="{{ asset("/assets/lideranca/css/style.css") }}" rel="stylesheet">
    @livewireStyles

    @stack('styles')
</head>
<body>

<!--*******************
    Preloader start
********************-->
<div id="preloader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--*******************
    Preloader end
********************-->

<!--**********************************
    Main wrapper start
***********************************-->
<div id="main-wrapper">

    <!--**********************************
        Nav header start
    ***********************************-->
    <div class="nav-header">
        <a href="{{ route("lideranca.inicio") }}" class="brand-logo">
            <img src="{{ asset("assets/icone.svg") }}" alt="logo-abbr" class="logo-abbr" width="50" height="50">
            <img src="{{ asset("assets/refugio.svg") }}" alt="brand-title" class="brand-title" height="52">
        </a>

        <div class="nav-control">
            <div class="hamburger">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
        </div>
    </div>
    <!--**********************************
        Nav header end
    ***********************************-->

    <!--**********************************
        Header start
    ***********************************-->
    <div class="header">
        <div class="header-content">
            <nav class="navbar navbar-expand">
                <div class="collapse navbar-collapse justify-content-end">
                    <ul class="navbar-nav header-right">
                        <li class="nav-item dropdown header-profile">
                            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="{{ auth()->user()->foto }}" width="20" alt="{{ auth()->user()->nome }}"/>
                                <div class="header-info">
                                    <span>{{ auth()->user()->nome }}</span>
                                    <small>{{ auth()->user()->email }}</small>
                                </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="{{ route("lideranca.logout") }}" class="dropdown-item ai-icon">
                                    <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger"
                                         width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                         stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                        <polyline points="16 17 21 12 16 7"></polyline>
                                        <line x1="21" y1="12" x2="9" y2="12"></line>
                                    </svg>
                                    <span class="ms-2">Sair</span>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--**********************************
        Header end ti-comment-alt
    ***********************************-->

    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li class="nav-label first">Refukids</li>
                @can(\App\Libraries\Permissoes::VISUALIZAR_LISTAGEM_DA_REFUKIDS)
                <li>
                    <a class="ai-icon" href="{{ route("lideranca.refukids") }}">
                        <i class="flaticon-381-list"></i>
                        <span class="nav-text">Lista</span>
                    </a>
                </li>
                @endcan
                @can(\App\Libraries\Permissoes::FAZER_CHAMADA_DA_REFUKIDS)
                <li>
                    <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                        <i class="flaticon-381-notepad"></i>
                        <span class="nav-text">Chamada</span>
                    </a>
                    <ul aria-expanded="false">
                        <li><a href="{{ route("lideranca.refukids.chamada", ["turma" => "refubabys"]) }}">Refubabys</a></li>
                        <li><a href="{{ route("lideranca.refukids.chamada", ["turma" => "refukids1"]) }}">Refukids 1</a></li>
                        <li><a href="{{ route("lideranca.refukids.chamada", ["turma" => "refukids2"]) }}">Refukids 2</a></li>
                        <li><a href="{{ route("lideranca.refukids.chamada", ["turma" => "refuteens"]) }}">Refuteens</a></li>
                    </ul>
                </li>
                @endcan
                @can(\App\Libraries\Permissoes::LIBERAR_ACESSO)
                <li class="nav-label">Configuração</li>
                <li>
                    <a class="ai-icon" href="{{ route('lideranca.configuracao.liberar-acesso') }}">
                        <i class="flaticon-381-key"></i>
                        <span class="nav-text">Liberar acesso</span>
                    </a>
                </li>
                @endcan
            </ul>
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->

    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        @if(isset($slot))
            {{ $slot }}
        @else
            @yield('conteudo')
        @endif
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
</div>
<!--**********************************
    Main wrapper end
***********************************-->

<div id="default-modal-image">
    <span id="default-modal-image-close">&times;</span>
    <img id="default-modal-image-source">
    <div id="default-modal-image-caption"></div>
</div>

<!--**********************************
    Scripts
***********************************-->
<!-- Required vendors -->
<script src="{{ asset("/assets/lideranca/vendor/global/global.min.js") }}"></script>
<script src="{{ asset("/assets/lideranca/vendor/bootstrap-select/dist/js/bootstrap-select.min.js") }}"></script>
<script src="{{ asset("/assets/lideranca/vendor/toastr/js/toastr.min.js") }}"></script>
<script src="{{ asset("/assets/lideranca/js/custom.js") }}"></script>
<script src="{{ asset("/assets/lideranca/js/deznav-init.js") }}"></script>
@livewireScripts

@stack('scripts')
</body>
</html>
