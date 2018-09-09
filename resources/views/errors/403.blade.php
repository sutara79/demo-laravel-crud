@php
    $title = __('Forbidden');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>
    <p><strong>{{ __('Error') }}: <span class="error-code">403</span></strong></p>
    <p>{{ __('You do not have permission to access this page.') }}</p>
</div>
@endsection