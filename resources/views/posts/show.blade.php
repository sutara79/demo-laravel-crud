@php
    $title = $post->title;
@endphp

@extends('../layouts/app')

@section('content')
<h1>{{ $title }}</h1>

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
            {{ $post->created_at->format(__('Y-m-d H:i:s')) }}
        </time>
    </dd>
    <dt>{{ __('Updated') }}:</dt>
    <dd>
        <time itemprop="dateModified" datetime="{{ $post->updated_at }}">
            {{ $post->updated_at->format(__('Y-m-d H:i:s')) }}
        </time>
    </dd>
</dl>
<hr>
<div>
    {{ $post->body }}
</div>
@endsection
