@php
    $title = "Edit: {$user->name}";
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url("users/{$user->id}") }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="name">Name:</label><br>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email:</label><br>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-success">
            Submit
        </button>
    </div>
</form>
@endsection
