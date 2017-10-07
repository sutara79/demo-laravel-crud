@php
    $title = __('Create Post');
@endphp

@extends('layouts.my')

@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('posts') }}" method="post">
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
            <textarea id="body" class="form-control" name="body" rows="8" required>{{ old('body') }}</textarea>

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
