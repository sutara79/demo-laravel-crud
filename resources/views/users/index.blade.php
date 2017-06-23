@php
    $title = __('Users');
@endphp

@extends('../layouts/app')

@section('content')
<h1>{{ $title }}</h1>

@if (Auth::check() && Auth::user()->isAdmin())
    <div>
        <a href="{{ url('users/create') }}" class="btn btn-primary">
            {{ __('Create') }}
        </a>
    </div>
@endif

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        <a href="{{ url("users/{$user->id}") }}">
                            {{ $user->name }}
                        </a>
                    </td>
                 </tr>
            @endforeach
        </tbody>
    </table>
</div>
{{ $users->links() }}
@endsection
