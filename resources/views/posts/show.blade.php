@php
    $title = $post->title;
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<div>
    <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">
        {{ __('Edit') }}
    </a>
    @component('form-del')
        @slot('table', 'posts')
        @slot('id', $post->id)
    @endcomponent
</div>
<dl>
    <dt>{{ __('Author') }}:</dt>
    <dd>
        <a href="{{ url('users/' . $post->user->id) }}">
            {{ $post->user->name }}
        </a>
    </dd>
    <dt>{{ __('Created') }}:</dt>
    <dd>
        <time itemprop="dateCreated" datetime="{{ $post->created_at }}">
            {{ $post->created_at->format(__('Y-m-d H:i:s')) }}
        </time>
    </dd>
</dl>
<hr>
<div>
    {{ $post->body }}
</div>
@endsection
