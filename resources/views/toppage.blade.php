@extends('layouts.app')

@section('title', 'demo-laravel-crud')

@section('content')
<h1>demo-laravel-crud</h1>
<p>
    {{ __('My practice for basic CRUD of Laravel 5.4 on Heroku.') }}<br>
    {{ __('Unfinished.') }}
</p>
<ul>
    <li>
        GitHub:
        <a href="https://github.com/sutara79/demo-laravel-crud" target="_blank">
            https://github.com/sutara79/demo-laravel-crud
        </a>
    </li>
    <li>
        Qiita:
        <a href="http://qiita.com/sutara79/items/ef30fcdfb7afcb2188ea" target="_blank">
            Laravel 5.4で基本的なCRUDを作る
        </a>
    </li>
</ul>
@endsection
