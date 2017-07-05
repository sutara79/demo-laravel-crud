@php
    $title = $post->title;
@endphp

@extends('../layouts/app')

@section('content')
<h1 id="post-title">{{ $title }}</h1>

@can('edit', $post)
    <div class="edit">
        <a href="{{ url('posts/' . $post->id . '/edit') }}" class="btn btn-primary">
            {{ __('Edit') }}
        </a>
        @component('form-del')
            @slot('controller', 'posts')
            @slot('id', $post->id)
            @slot('name', $post->title)
        @endcomponent
    </div>
@endcan

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
            {{ myDate($post->created_at) }}
        </time>
    </dd>
    <dt>{{ __('Updated') }}:</dt>
    <dd>
        <time itemprop="dateModified" datetime="{{ $post->updated_at }}">
            {{ myDate($post->updated_at) }}
        </time>
    </dd>
</dl>
<hr>
<div id="post-body">
    {{ $post->body }}
</div>
@endsection
