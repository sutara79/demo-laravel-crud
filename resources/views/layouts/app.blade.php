<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>
        @if (Request::path() != '/')
            @yield('title') | 
        @endif
        {{ env('APP_NAME') }}
        </title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0-alpha.6/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/my.css') }}">
    </head>
    <body>
        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="{{ secure_url('/') }}">{{ env('APP_NAME') }}</a>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
<!--                     <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ secure_url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ secure_url('user') }}">User</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>

        <!-- JavaScript -->
        <script src="https://cdn.jsdelivr.net/combine/npm/jquery@3.2/dist/jquery.min.js,npm/tether@1.4/dist/js/tether.min.js,npm/bootstrap@4.0.0-alpha.6/dist/js/bootstrap.min.js"></script>
    </body>
</html>
