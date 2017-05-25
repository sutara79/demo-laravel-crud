@extends('../layouts/foo')
@section('title', $title)
@section('content')
  {{-- 個別ページの内容 --}}
  <h1>{{ $title }}</h1>
  <p>{{ $body }}</p>
@endsection