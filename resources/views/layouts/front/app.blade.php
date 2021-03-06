<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Global site tag (gtag.js) - Google Analytics
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ env('GOOGLE_ANALYTICS') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ env('GOOGLE_ANALYTICS') }}');
    </script>-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <title>Mini-ccom - Mrpropre</title>
    <meta name="description" content="Modern open-source e-commerce framework for free">
    <meta name="tags" content="Services de Pressing, Blanchisserie. Retraits et livraisons gratuits à domicile ou sur votre lieu de travail .">
    <meta name="author" content="Rodrigue mbah">
    <link href="{{ asset('css/style.min.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="{{ asset('https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')}}"></script>
    <script src="{{ asset('https://oss.maxcdn.com/respond/1.4.2/respond.min.js')}}"></script>
    <![endif]-->
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicons/apple-icon-57x57.png')}}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicons/apple-icon-60x60.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicons/apple-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicons/apple-icon-76x76.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicons/apple-icon-114x114.png')}}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicons/apple-icon-120x120.png')}}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicons/apple-icon-144x144.png')}}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicons/apple-icon-152x152.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicons/apple-icon-180x180.png')}}">
    <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicons/android-icon-192x192.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{ asset('favicons/manifest.json')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('favicons/ms-icon-144x144.png')}}">
    <meta name="theme-color" content="#ffffff">
    @yield('css')
    <meta property="og:url" content="{{ request()->url() }}"/>
    @yield('og')
     {{--jQuery (necessary for Bootstrap's JavaScript plugins)
    <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js') }}"></script>--}}

</head>
<body>
<noscript>
    <p class="alert alert-danger">
        You need to turn on your javascript. Some functionality will not work if this is disabled.
        <a href="https://www.enable-javascript.com/" target="_blank">Read more</a>
    </p>
</noscript>
@include('layouts.front.css-front')
<section>
    <div class="hidden-xs">
        <div class="container">
            <div class="clearfix"></div>
            <div class="pull-right">
                <ul class="nav navbar-nav navbar-right">
                    @if(auth()->check())
                        <li><a href="{{ route('accounts', ['tab' => 'orders']) }}"><i class="fa fa-home"></i> My Account</a></li>
                        <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a></li>
                    @else
                        <li><a href="{{ route('login') }}"> <i class="fa fa-lock"></i> Login</a></li>
                        <li><a href="{{ route('register') }}"> <i class="fa fa-sign-in"></i> Register</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <header id="header-section">
        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                           {{-- <a href="#">colo<span>shop</span></a>--}}
                            <a class="navbar-bran" style="" href="{{ route('home') }}"><img id="logo" width="150" style="height: 80px" src="{{ asset('images/logo-m-propre.jpg')}}" alt="Logo" class=""></a>

                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li id="home"><a href="{{ route('home') }}" class="nav-link">Accueil</a></li>
                                <li id="tarif"><a  href="{{ route('tarif_path') }}" class="nav-link">Nos tarifs</a></li>
                                <li id="apropos"><a href="{{ route('about_path') }}" class="nav-link">Apropos</a></li>
                                <li id="blog"><a href="{{ route('blog_path') }}" class="nav-link">Blog</a></li>
                                <li id="contact"><a href="{{ route('contact_path') }}" class="nav-link">Contact</a></li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    {{--    <nav class="navbar navbar-default">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header col-md-2">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" style="" href="{{ route('home') }}"><img id="logo" width="150" style="height: 60px" src="{{ asset('images/logo-m-propre.jpg')}}" alt="Logo" class=""></a>
                </div>
                <div class="col-md-6">
                        <ul class="header-menu">
                            <li id="home"><a href="{{ route('home') }}" class="nav-link">Accueil</a></li>
                            <li id="tarif"><a  href="{{ route('tarif_path') }}" class="nav-link">Nos tarifs</a></li>
                            <li id="apropos"><a href="{{ route('about_path') }}" class="nav-link">Apropos</a></li>
                            <li id="blog"><a href="{{ route('blog_path') }}" class="nav-link">Blog</a></li>
                            <li id="contact"><a href="{{ route('contact_path') }}" class="nav-link">Contact</a></li>
                        </ul>
                </div>
                <div class="col-md-4">
                    @include('layouts.front.header-cart')
                </div>
            </div>
        </nav>--}}
    </header>
</section>
@yield('content')

<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/front.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@yield('js')
@include('flashy::message')
@include('layouts.front.footer')
</body>
</html>