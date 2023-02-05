<!-- Page Header-->
<header class="section page-header">
    <!-- RD Navbar-->
    <div class="rd-navbar-wrap rd-navbar-absolute">
        <nav class="rd-navbar rd-navbar-creative" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed"
            data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static"
            data-lg-device-layout="rd-navbar-static" data-xl-layout="rd-navbar-static"
            data-xl-device-layout="rd-navbar-static" data-lg-stick-up-offset="20px" data-xl-stick-up-offset="20px"
            data-xxl-stick-up-offset="20px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main-outer">
                <div class="rd-navbar-main">
                    <!-- RD Navbar Panel-->
                    <div class="rd-navbar-panel">
                        <!-- RD Navbar Toggle-->
                        <button class="rd-navbar-toggle"
                            data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                        <!-- RD Navbar Brand-->
                        <div class="rd-navbar-brand">
                            <a class="brand" href="{{ route('inicio') }}"><img src="/images/logo-302x44.png" alt=""
                                    width="151" height="22" /></a>
                        </div>
                    </div>
                    <div class="rd-navbar-main-element">
                        <div class="rd-navbar-nav-wrap">
                            <!-- RD Navbar Nav-->
                            <ul class="rd-navbar-nav">
                                <li class="rd-nav-item {{ Route::currentRouteName() === 'inicio' ? 'active' : '' }}">
                                    <a class="rd-nav-link" href="{{ route('inicio') }}">Inicio</a>
                                </li>
                                <li class="rd-nav-item {{ Route::currentRouteName() === 'refukids' ? 'active' : '' }}">
                                    <a class="rd-nav-link" href="{{ route('refukids.cadastro') }}">Refukids</a>
                                </li>
                                @if(env('ATIVAR_LIDERANCA', false) === true)
                                @auth
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="#">
                                            <img src="{{ Auth::user()->foto }}" alt="{{ Auth::user()->nome_completo }}">
                                            {{ Auth::user()->nome }}
                                        </a>
                                    </li>
                                @endauth
                                @guest
                                    <li class="rd-nav-item">
                                        <a class="rd-nav-link" href="{{ route('auth.google.redirect') }}">Liderança</a>
                                    </li>
                                @endguest
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
