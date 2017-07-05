@php
    $title = __('Edit') . ': ' . $post->title;
@endphp

@extends('../layouts/app')

@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('posts/' . $post->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">{{ __('Title') }}</label>
        <div>
            <input id="title" type="text" class="form-control" name="title" value="{{ $post->title }}" required autofocus>
            @if ($errors->has('title'))
                <span class="help-block">
                    <strong>{{ $errors->first('title') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
        <label for="body">{{ __('Body') }}</label>
        <div>
            <textarea id="body" class="form-control" name="body" rows="8" required>{{ $post->body }}</textarea>

            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </div>
</form>
@endsection
