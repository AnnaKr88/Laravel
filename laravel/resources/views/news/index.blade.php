@extends('layouts.main')
@section('title')
    News: @parent
@endsection
@section('content')
<section class="page-section cta">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        @forelse($listNews as $news)
        <div class="post-preview" style="width: 30%;">
{{--            <p>Категория: </p> <a href="{{ route('news.oneCat', ['cat' => $news['cat']]) }}"><p>{{ $news['cat'] }}</p></a>--}}
            <h3 class="post-title">
{{--                <a href="{{ route('news.oneNews', ['id' => $key]) }}">{{ $news['title'] }}</a>--}}
            </h3>
            </a>
            <p>{{ $news->info }}</p>
{{--            <p class="post-meta">Опубликовал--}}
{{--                <a href="#">{{ $news['author'] }}</a>--}}
{{--                в {{ $news['created_at']->format('d-m-Y H:i') }}</p>--}}
        </div>
        @empty
        <h2>Новостей нет</h2>
        @endforelse

    </div>
    <div class="pagination">
        {{ $listNews->links() }}
    </div>
</section>

@stop
