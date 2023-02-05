<!DOCTYPE html>
<html class="wide wow-animation" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    @yield('meta')
    <meta name="description" content="Somos uma rede de células pertencente a Igreja do Evangelho Quadrangular - Sede do Pará, que funciona de modo organizo e relacional.">
    <meta name="robots" content="all">
    <meta name="author" content="Refúgio Lifestyle">
    <meta name="keywords" content="Refúgio, Jovens, Igreja, Evangelho Quadrangular, Belém">
    <meta property="og:type" content="page">
    <meta property="og:url" content="https://arearefugio.com.br/">
    <meta property="og:title" content="Refúgio Lifestyle">
    <meta property="og:image" content="https://arearefugio.com.br/images/refugio.png">
    <meta property="og:description" content="Somos uma rede de células pertencente a Igreja do Evangelho Quadrangular - Sede do Pará, que funciona de modo organizo e relacional.">
    <meta property="article:author" content="Refúgio Lifestyle">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@">
    <meta name="twitter:title" content="Refúgio Lifestyle">
    <meta name="twitter:creator" content="@">
    <meta name="twitter:description" content="Somos uma rede de células pertencente a Igreja do Evangelho Quadrangular - Sede do Pará, que funciona de modo organizo e relacional.">
    <meta name="format-detection" content="telephone=no" />
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon-->
    <link href="/images/favicon-dark.png" rel="icon" media="(prefers-color-scheme: light)" />
    <link href="/images/favicon-light.png" rel="icon" media="(prefers-color-scheme: dark)" />
    <!-- Title-->
    <title>@yield('titulo') :: Refúgio Lifestyle</title>
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,700,900" />
    <link rel="stylesheet" href="/css/bootstrap.css" />
    <link rel="stylesheet" href="/css/datatables.css" />
    <link rel="stylesheet" href="/css/fonts.css" />
    <link rel="stylesheet" href="/css/style.css" id="main-styles-link" />
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
    <script src="/js/core.min.js"></script>
    <script src="/js/script.js"></script>
    @livewireScripts
</body>

</html>
