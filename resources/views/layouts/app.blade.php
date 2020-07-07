<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('images/LOSAfrica.png') }}" />

    <title>{{ config('app.name', 'Living Open Source Community') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/los.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-5.13.0-web/css/all.min.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-los shadow-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img class="logo"
                 src="{{ asset('images/LivingOpenSourceLogoOrangeText.jpg') }}" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
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
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <router-link  class="dropdown-item" to="/home/users">
                                        {{ __('Users') }}
                                    </router-link >
                                    <router-link  class="dropdown-item" to="/home/trainings">
                                        {{ __('Trainings') }}
                                    </router-link >
                                    <router-link  class="dropdown-item" to="/home/terminal">
                                        {{ __('Terminal') }}
                                    </router-link >
                                    <router-link  class="dropdown-item" to="/home/knowledge">
                                        {{ __('Knowledge Base') }}
                                    </router-link >
                                    <router-link class="dropdown-item" to="/home/preferences">
                                        {{ __('Preferences') }}
                                    </router-link >
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <div class="footer">
    The Living Open Source Foundation
    <br />
    Advocates of Open Source
    <br />
    &copy; 2018 - {{ date('Y') }}
    </div>
</body>
<script src="{{ asset('fontawesome-5.13.0-web/js/all.min.js') }}" defer></script>
@yield('script')
</html>
