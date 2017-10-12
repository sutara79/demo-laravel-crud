@php
    $title = __('Login');
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input id="email" type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group">
        <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="form-control" name="password" required>
    </div>
    <div class="form-check">
        <label class="form-check-label">
            <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            {{ __('Remember Me') }}
        </label>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">{{ __('Login') }}</button>
    <a class="btn btn-link" href="{{ route('password.request') }}">
        {{ __('Forgot Your Password?') }}
    </a>
</form>
@endsection
