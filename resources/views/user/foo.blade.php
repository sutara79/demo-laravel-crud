<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div>

            <div class="content">
                <h1>Hello, {{ $name }}</h1>
                <p>{{ $path }}</p>
            </div>
        </div>
    </body>
</html>
