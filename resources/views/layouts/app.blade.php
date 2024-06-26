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

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">


        <nav class="navbar navbar-expand-md navbar-light  shadow-sm" id="header" >
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    <img src="../../img/logo-nobg.png" alt="" id="logo" width="100" >
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item @if(request()->is('/')) active @endif">
                            <a class="nav-link @if(request()->is('/')) text-primary fw-bold @endif" href="{{url('/') }}">{{ __('Home') }}</a>
                        </li>
                        @auth
                        <li class="nav-item @if(request()->is('admin/halls')) active @endif">
                            <a class="nav-link @if(request()->is('admin/halls')) text-primary  fw-bold @endif" href="{{url('admin/halls') }}">{{ __('Sale') }}</a>
                        </li>
                        <li class="nav-item @if(request()->is('admin/movies')) active @endif">
                            <a class="nav-link @if(request()->is('admin/movies')) text-primary fw-bold @endif" href="{{url('admin/movies') }}">{{ __('Movie') }}</a>
                        </li>
                        <li class="nav-item @if(request()->is('admin/reviews')) active @endif">
                            <a class="nav-link @if(request()->is('admin/reviews')) text-primary fw-bold @endif" href="{{url('admin/reviews') }}">{{ __('Reviews') }}</a>
                        </li>
                        <li class="nav-item @if(request()->is('admin/time_slots')) active @endif">
                            <a class="nav-link @if(request()->is('admin/time_slots')) text-primary fw-bold @endif" href="{{url('admin/time_slots') }}">{{ __('Time slots') }}</a>
                        </li>
                        <li class="nav-item @if(request()->is('admin/halls_movies')) active @endif">
                            <a class="nav-link @if(request()->is('admin/halls_movies')) text-primary fw-bold @endif" href="{{url('admin/halls_movies') }}">{{ __('Halls Movies') }}</a>
                        </li>
                        <li>
                            <a href="http://localhost:5174/" class="nav-link">
                                <i class="fa-solid fa-desktop mx-2"></i><span>Web App</span>
                              </a>
                        </li>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('dashboard') }}">{{__('Dashboard')}}</a>
                                <a class="dropdown-item" href="{{ url('profile') }}">{{__('Profile')}}</a>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <a class="dropdown-item" href="http://localhost:5174">Go to Website</a>

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

        <main>
            @yield('content')
        </main>
        @include('partials.footer')
    </div>
</body>

</html>
