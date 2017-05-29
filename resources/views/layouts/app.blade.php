@php
    $path = Request::path();
    $reg_users = '/^users$|^users\//';
    $reg_posts = '/^posts$|^posts\//';
    $reg_login = '/^login$|^password\//';
@endphp
<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- CSRF Token -->
    <title>@if ($path != '/') @yield('title') | @endif{{ env('APP_NAME') }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0-alpha.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ secure_asset('css/common.css') }}">
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ secure_url('/') }}">{{ env('APP_NAME') }}</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if (preg_match($reg_users, $path)) active @endif">
                    <a class="nav-link" href="{{ secure_url('users') }}">
                        {{ __('Users') }}
                        @if (preg_match($reg_users, $path))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if (preg_match($reg_posts, $path)) active @endif">
                    <a class="nav-link" href="{{ secure_url('posts') }}">
                        {{ __('Posts') }}
                        @if (preg_match($reg_posts, $path))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                @if (Auth::guest())
                    <li class="nav-item @if (preg_match($reg_login, $path)) active @endif">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                            @if (preg_match($reg_login, $path))
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item @if ($path == 'register') active @endif">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('Register') }}
                            @if ($path == 'register')
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown-user">
                            <a class="dropdown-item" href="{{ secure_url('users/' . Auth::user()->id) }}">
                                {{ __('Profile') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                @endif
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown-lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('locale.' . App::getLocale()) }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown-lang">
                        @if (!App::isLocale('en'))
                            <a class="dropdown-item" href="{{ secure_url('locale/en') }}">
                                {{ __('locale.en') }}
                            </a>
                        @endif
                        @if (!App::isLocale('ja'))
                            <a class="dropdown-item" href="{{ secure_url('locale/ja') }}">
                                {{ __('locale.ja') }}
                            </a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <!-- JavaScript -->
    <!-- jQuery, Tether, Bootstrap4 -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.2/dist/jquery.min.js,npm/tether@1.4/dist/js/tether.min.js,npm/bootstrap@4.0.0-alpha.6/dist/js/bootstrap.min.js"></script>
    <script src="{{ secure_asset('js/common.js') }}"></script>
</body>
</html>
