@php
    $title = __('Create Post');
@endphp

@extends('../layouts/app')

@section('title', $title)

@section('content')
<h1>{{ $title }}</h1>
<form action="{{ secure_url('posts') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('POST') }}
    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
        <label for="title">{{ __('Title') }}</label>
        <div>
            <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}" required autofocus>
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
            <textarea id="body" class="form-control" name="body" value="{{ old('body') }}" rows="8" required></textarea>

            @if ($errors->has('body'))
                <span class="help-block">
                    <strong>{{ $errors->first('body') }}</strong>
                </span>
            @endif
        </div>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            {{ __('Submit') }}
        </button>
    </div>
</form>
@endsection
