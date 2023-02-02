<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport"
        content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon-->
    <link href="/images/favicon-dark.png" rel="icon" media="(prefers-color-scheme: light)" />
    <link href="/images/favicon-light.png" rel="icon" media="(prefers-color-scheme: dark)" />
    <!-- Title-->
    <title>@yield('titulo') :: Refúgio Lifestyle</title>
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,700,900" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/fonts.css" />
    <link rel="stylesheet" href="css/style.css" id="main-styles-link" />
    @livewireStyles
</head>

<body>
    <!-- Preloader-->
    <div class="preloader">
        <div class="preloader-body">
            <div class="cssload-container">
                <div class="cssload-speeding-wheel"></div>
            </div>
        </div>
    </div>
    <div class="page">
        @include('layouts.cabecalho')
        @yield('conteudo')
        @include('layouts.rodape')
    </div>

    <!-- Global Mailform Output-->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript-->
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
    @livewireScripts
</body>

</html>
