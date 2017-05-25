@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form action="{{ secure_url("users/{$user->id}/edit") }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <p>
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="{{ $user->name }}">
    </p>
    <p>
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="{{ $user->email }}">
    </p>
    <p>
        <input type="submit" value="Submit">
    </p>
</form>
@endsection
