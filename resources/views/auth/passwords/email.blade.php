@php
    $title = __('Reset Password');
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<form class="form-horizontal" role="form" method="POST" action="{{ route('password.email') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="email">{{ __('Email') }}</label>
        <input id="email" type="email" class="form-control @if ($errors->has('email')) is-invalid @endif" name="email" value="{{ old('email') }}" required autofocus>
        @if ($errors->has('email'))
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary">{{ __('Send Password Reset Link') }}</button>
</form>
@endsection
