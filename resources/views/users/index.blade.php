@php
    $title = __('Users');
@endphp
@extends('layouts.my')
@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    @if (Auth::check() && Auth::user()->isAdmin())
        {{-- 管理者にのみ、「ユーザー作成」のメニューを表示する --}}
        <div class="mb-2">
            <a href="{{ url('users/create') }}" class="btn btn-primary">
                {{ __('Create') }}
            </a>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td><a href="{{ url('users/'.$user->id) }}">{{ $user->name }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
</div>
@endsection