<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    </head>
    <body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">INVENTORY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <!-- Authentication Links -->
      @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
        
    </ul>
  </div>
        </div>
        
    </nav>

    <div class="container mt-3">
        @if(session('mssg'))
            <div class="alert alert-success" role="alert">
                {{ session('mssg') }}
            </div>
        @endif
        @if(session('hps'))
            <div class="alert alert-danger" role="alert">
                {{ session('hps') }}
            </div>
        @endif
    </div>


    <div class="container">
    @guest
            @if (Route::has('register'))
                <div></div>
            @endif
        @else
                <div class="row ">
                    <div class="col-md-2">
                            <nav >
                                <div class="col-sm-12" id="fixed-sidebar">
                                    <!-- <a href="index.html"><img id="home-logo" src="../media/logo-prueba.jpg" alt="Logo de Animanoir"></a>  -->
                                    <ul>
                                        <li class="fuente-fjalla ul-personalizada"><img src="/img/dashboard.png" alt=""><a href="/">Dahsboard</a></li>
                                        <li class="fuente-fjalla ul-personalizada"><img src="/img/item.png" alt=""> <a href="{{ route('pembelian.create') }}">Form Beli</a></li>
                                        <li class="fuente-fjalla ul-personalizada"><img src="/img/item.png" alt=""> <a href="{{ route('pembelian.index') }}">Laporan Pembelian</a></li>
                                        <li class="fuente-fjalla ul-personalizada"><img src="/img/item.png" alt=""> <a href="{{ route('jual.create') }}">Form Jual</a></li>
                                        <li class="fuente-fjalla ul-personalizada"><img src="/img/item.png" alt=""> <a href="{{ route('jual.index') }}">Rekapan Penjualan</a></li>
                                        <li class="fuente-fjalla ul-personalizada"><img src="/img/supplier.png" alt=""> <a href="{{ route('supplier.index') }}">Daftar Supplier</a> </li>
                                        <li class="fuente-fjalla ul-personalizada">Blog</li>
                                        <li class="fuente-fjalla ul-personalizada"><a href="acerca.html">About</a></li>
                                        <li class="fuente-fjalla ul-personalizada">Contact Us</li>
                                    </ul>
                                </div>
                            </nav>
                    </div>

        @endguest
            <div class="col-md-10">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>

        <script src="/js/scripts.js"></script>
        <script
            src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"
        ></script>
        <script
            src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
