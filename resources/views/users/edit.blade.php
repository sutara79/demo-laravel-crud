@php
    $title = __('Edit').': '.$user->name;
@endphp
@extends('layouts.my')
@section('content')
<h1>{{ $title }}</h1>
<form action="{{ url('users/'.$user->id) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="name">{{ __('Name') }}:</label><br>
        <input type="text" name="name" value="{{ $user->name }}" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">{{ __('Email') }}:</label><br>
        <input type="email" name="email" value="{{ $user->email }}" class="form-control">
    </div>
    <div class="form-group">
        <button type="submit" name="submit" class="btn btn-success">
            {{ __('Submit') }}
        </button>
    </div>
</form>
@endsection
