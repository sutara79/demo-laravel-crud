@php
    $title = 'Create User';
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form action="{{ secure_url('users') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <p>
        <label for="name">Name:</label><br>
        <input type="text" name="name">
    </p>
    <p>
        <label for="email">Email:</label><br>
        <input type="email" name="email">
    </p>
    <p>
        <label for="password">Password:</label><br>
        <input type="password" name="password">
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>
@endsection
