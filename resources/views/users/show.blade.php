@php
    $title = __('User') . ': ' . $user->name;
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<div>
    <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn btn-primary">
        {{ __('Edit') }}
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
                <th>{{ __('Name') }}</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>{{ __('Email') }}</th>
                <td>{{ $user->email }}</td>
            </tr>
        </tbody>
    </table>
</div>

<h2>{{ __('Posts') }}</h2>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Body') }}</th>
                <th>{{ __('Created') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user->posts as $post)
                <tr>
                    <td>
                        <a href="{{ url('posts/' . $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->format('Y年m月d日 H:i:s') }}</td>
                    <td nowrap>
                        <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">
                            {{ __('Edit') }}
                        </a>
                        @component('form-del')
                            @slot('table', 'posts')
                            @slot('id', $post->id)
                        @endcomponent
                    </td>
                 </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
