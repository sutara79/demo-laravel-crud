@php
    $title = "User: {$user->name}";
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<div>
    <a href="{{ secure_url("users/{$user->id}/edit") }}">
        Edit
    </a>
    @component('form-del')
        @slot('table', 'users')
        @slot('id', $user->id)
    @endcomponent
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <tbody>
            <tr>
                <th>ID</th>
                <td>{{ $user->id }}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection
