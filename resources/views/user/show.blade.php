<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <h1>Detail: {{ $user->name }}</h1>
        <dl>
            <dt>ID:</dt>
            <dd>{{ $user->id }}</dd>
            <dt>Name:</dt>
            <dd>{{ $user->name }}</dd>
            <dt>Email:</dt>
            <dd>{{ $user->email }}</dd>
        </dl>
    </body>
</html>
