@php
    $title = __('Create Post');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <form action="{{ url('posts') }}" method="post">
        @csrf
        @method('POST')
        <div class="form-group">
            <label for="title">{{ __('Title') }}</label>
            <input id="title" type="text" class="form-control @if ($errors->has('title')) is-invalid @endif" name="title" value="{{ old('title') }}" required autofocus>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('title') }}
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="body">{{ __('Body') }}</label>
            <textarea id="body" class="form-control @if ($errors->has('body')) is-invalid @endif" name="body" rows="8" required>{{ old('body') }}</textarea>
            @if ($errors->has('body'))
                <span class="invalid-feedback" role="alert">
                    {{ $errors->first('body') }}
                </span>
            @endif
        </div>
        <button type="submit" name="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </form>
</div>
@endsection