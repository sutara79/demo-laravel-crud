<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"><!-- CSRF Token -->
    <title>@if (! Request::is('/')){{ $title }} | @endif{{ env('APP_NAME') }}</title>

    <!-- Open Graph protocol -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ env('APP_NAME') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:image" content="{{ asset('img/og_image.png') }}" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:description" content="{{ __('My practice for basic CRUD of Laravel 5.5 on Heroku.') }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:player" content="@sutara_lumpur" />
    <meta property="fb:admins" content="100000634897828" />

    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name') }}</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">

            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if (my_is_current_controller('posts')) active @endif">
                    <a class="nav-link" href="{{ url('posts') }}">
                        {{ __('Posts') }}
                        @if (my_is_current_controller('posts'))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
                <li class="nav-item @if (my_is_current_controller('users')) active @endif">
                    <a class="nav-link" href="{{ url('users') }}">
                        {{ __('Users') }}
                        @if (my_is_current_controller('users'))
                            <span class="sr-only">(current)</span>
                        @endif
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav my-2 my-lg-0">
                <li class="nav-item">
                    <a href="{{ url('posts/create') }}" id="new-post" class="btn btn-success">
                        {{ __('New Post') }}
                    </a>
                </li>
                @guest
                    <li class="nav-item @if (my_is_current_controller('login, password')) active @endif">
                        <a class="nav-link" href="{{ route('login') }}">
                            {{ __('Login') }}
                            @if (my_is_current_controller('login, password'))
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item @if (my_is_current_controller('register')) active @endif">
                        <a class="nav-link" href="{{ route('register') }}">
                            {{ __('Register') }}
                            @if (my_is_current_controller('register'))
                                <span class="sr-only">(current)</span>
                            @endif
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown-user" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
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
                @endguest
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" id="dropdown-lang" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ __('locale.'.App::getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-lang">
                        @if (!App::isLocale('en'))
                            <a class="dropdown-item" href="{{ my_locale_url('en') }}">
                                {{ __('locale.en') }}
                            </a>
                        @endif
                        @if (!App::isLocale('ja'))
                            <a class="dropdown-item" href="{{ my_locale_url('ja') }}">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
