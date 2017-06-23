<!doctype html>
<html lang="{{ config('app.locale') }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- CSRF Token -->
    <title>@if (!isCurrentController('')){{ $title }} | @endif{{ env('APP_NAME') }}</title>

    <!-- Open Graph protocol -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ env('APP_NAME') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('img/og_image.png') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ __('My practice for basic CRUD of Laravel 5.4 on Heroku.') }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:player" content="@sutara_lumpur" />
    <meta property="fb:admins" content="100000634897828" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0-alpha.6/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body>
    <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">{{ env('APP_NAME') }}</a>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if (isCurrentController('posts')) active @endif">
                    <a class="nav-link" href="{{ url('posts') }}">
                        {{ __('Posts') }}
                        @if (isCurrentController('posts'))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if (isCurrentController('users')) active @endif">
                    <a class="nav-link" href="{{ url('users') }}">
                        {{ __('Users') }}
                        @if (isCurrentController('users'))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a href="{{ url('posts/create') }}" class="btn btn-success">
                        {{ __('New Post') }}
                    </a>
                </li>
                @if (Auth::guest())
                    <li class="nav-item @if (isCurrentController('login, password')) active @endif">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                            @if (isCurrentController('login, password'))
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item @if (isCurrentController('register')) active @endif">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('Register') }}
                            @if (isCurrentController('register'))
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
                            <a class="dropdown-item" href="{{ url('users/' . Auth::user()->id) }}">
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
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="dropdown-lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('locale.' . App::getLocale()) }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdown-lang">
                        @if (!App::isLocale('en'))
                            <a class="dropdown-item" href="{{ urlChangeLocale('en') }}">
                                {{ __('locale.en') }}
                            </a>
                        @endif
                        @if (!App::isLocale('ja'))
                            <a class="dropdown-item" href="{{ urlChangeLocale('ja') }}">
                                {{ __('locale.ja') }}
                            </a>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        @yield('content')
    </div>

    <!-- JavaScript -->
    <!-- jQuery, Tether, Bootstrap4 -->
    <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.2/dist/jquery.min.js,npm/tether@1.4/dist/js/tether.min.js,npm/bootstrap@4.0.0-alpha.6/dist/js/bootstrap.min.js"></script>
</body>
</html>
