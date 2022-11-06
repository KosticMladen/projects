<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- <link rel="stylesheet" href="{{ asset('template/dist/css/theme.min.css') }}"> -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite('resources/css/app.css')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a id="logo" class="navbar-brand fs-4 fw-bold" href="{{ url('/') }}">
                    Online<img src="{{ asset('images/logo.png') }}" alt="logo"> Appointment
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li>
                                @if(!auth()->user()->image)
                                    <img width="40" class="rounded-circle" src="{{ asset('images/admin.jpg') }}" alt="existing-user-photo">
                                @else
                                    <img width="40" class="rounded-circle" src="{{ asset('profile') }}/{{ auth()->user()->image }}" alt="existing-user-photo">
                                @endif
                            </li>
                            <li class="nav-item">
                                <a
                                    class="nav-link"
                                    @if(in_array(auth()->user()->role->name, ['admin', 'doctor']))
                                        href="{{ route('dashboard') }}"
                                    @else 
                                        href="{{ url('/user-profile') }}"
                                    @endif
                                    role="button"
                                >
                                    {{ Auth::user()->name }}
                                </a>
                            </li>
                            @if(auth()->check() && auth()->user()->role->name === 'patient')
                                <li class="nav-item">
                                    <a href="{{ route('my.booking') }}" class="nav-link">
                                        {{ __('My Appointments') }}
                                    </a>
                                </li>
                            @endif
                            @if(auth()->check() && auth()->user()->role->name === 'patient')
                                <li class="nav-item">
                                    <a href="{{ route('my.prescription') }}" class="nav-link">
                                        {{ __('My Prescriptions') }}
                                    </a>
                                </li>
                            @endif
                            <li>
                            @if(Auth::check())
                    <div>
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endif
                            </li>
                        @endguest
                    </ul>
                </div>
                <!-- @if(Auth::check())
                    <div>
                        <a style="text-decoration: 0; color: black; margin-left: 1rem;" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                @endif -->
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @vite('resources/js/app.js')
    <style>
        .rad-label {
            display: flex;
            align-items: center;

            border-radius: 100px;
            padding: 14px 16px;
            margin: 10px 0;

            cursor: pointer;
            transition: .3s;
        }

        .rad-label:hover,
        .rad-label:focus-within {
        background: hsla(0, 0%, 80%, .14);
        }

        .rad-input {
        position: absolute;
        left: 0;
        top: 0;
        width: 1px;
        height: 1px;
        opacity: 0;
        z-index: -1;
        }

        .rad-design {
        width: 22px;
        height: 22px;
        border-radius: 100px;

        background: linear-gradient(to right bottom, #1976D2, hsl(225, 97%, 62%));
        /* background: linear-gradient(to right bottom, hsl(154, 97%, 62%), hsl(225, 97%, 62%)); */
        position: relative;
        }

        .rad-design::before {
        content: '';

        display: inline-block;
        width: inherit;
        height: inherit;
        border-radius: inherit;

        background: hsl(0, 0%, 90%);
        transform: scale(1.1);
        transition: .3s;
        }

        .rad-input:checked+.rad-design::before {
        transform: scale(0);
        }

        .rad-text {
        color: hsl(0, 0%, 60%);
        margin-left: 14px;
        letter-spacing: 3px;
        font-size: 18px;
        font-weight: 900;

        transition: .3s;
        }

        .rad-input:checked~.rad-text {
        color: hsl(0, 0%, 40%);
        }
    </style>
</body>
</html>
