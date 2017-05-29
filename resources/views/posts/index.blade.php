@php
    $title = __('Posts');
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>

<div>
    <a href="{{ url('posts/create') }}" class="btn btn-primary">
        {{ __('Create') }}
    </a>
</div>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>{{ __('Author') }}</th>
                <th>{{ __('Title') }}</th>
                <th>{{ __('Body') }}</th>
                <th>{{ __('Created') }}</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td>
                        <a href="{{ url('users/' . $post->user->id) }}">
                            {{ $post->user->name }}
                        </a>
                    </td>
                    <td>
                        <a href="{{ url("posts/{$post->id}") }}">
                            {{ $post->title }}
                        </a>
                    </td>
                    <td>{{ $post->body }}</td>
                    <td>{{ $post->created_at->format(__('Y-m-d H:i:s')) }}</td>
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
{{ $posts->links() }}
@endsection
