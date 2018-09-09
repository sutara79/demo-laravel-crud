@php
    $title = __('Internal Server Error');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p><strong>{{ __('Error') }}: <span class="error-code">500</span></strong></p>
    <p>{{ __('The server was unable to complete your request.') }}</p>
</div>
@endsection