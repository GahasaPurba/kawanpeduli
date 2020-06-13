<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>KawanPeduli || @yield('title')</title>
    <link rel="icon" href="{{ asset('frontend/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/card.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/v/bs4/jq-3.3.1/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.css" />
</head>
<body>
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a href="{{ url('/') }}" class="navbar-brand">
                            <img alt="Logo KawanPeduli" width="300" src="{{ asset('frontend/img/logo.png') }}">
                        </a>
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a href="{{ route('blog') }}" class="nav-link">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('statistik') }}" class="nav-link">Statistik</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('forum') }}" class="nav-link">Forum</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('/tentangkami') }}" class="nav-link">Tentang Kami</a>
                                </li>
                                @if (Auth::check())
                                <li class="nav-item">
                                    <a href="{{ route('home') }}" class="nav-link">DASHBOARD</a>
                                </li>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="nav-item">
                                    <a href="{{ route('logout') }}" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">LOG OUT</a>
                                    <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                                @else
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link text-primary">LOG IN</a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @include('frontend.template.footer')

    @include('sweetalert::alert')
