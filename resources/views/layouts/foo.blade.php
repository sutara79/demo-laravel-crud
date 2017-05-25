<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <title>@yield('title')</title>
    </head>
    <body>
        {{-- 個別ページの内容はここに挿入される --}}
        @yield('content')
    </body>
</html>