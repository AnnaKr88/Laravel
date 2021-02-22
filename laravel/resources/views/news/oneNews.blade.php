@extends('layouts.main')
@section('title')
    {{ $news['title'] }}: @parent
@endsection
@section('content')
<section class="page-section cta">
    <div class="container">
        <a href="{{ route('news.oneCat', ['cat' => $news['cat']]) }}"><p>{{ $news['cat'] }}</p></a>
        <h3>{{ $news['title'] }}</h3>
            {{ $news['text']}}
    </div>
</section>
@stop
