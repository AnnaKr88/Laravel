@extends ('layouts.main')
@section('title')
    @foreach($news as $new)
        {{ $new['cat'] }}: @parent
    @endforeach
@endsection
@section('content')
<section class="page-section cta">
    <div class="container" style="display: flex; flex-wrap: wrap; justify-content: space-between;">
        @forelse($news as $key => $new)
        <div class="post-preview" style="width: 30%;">
            <p>Категория: </p> <p>{{ $new['cat'] }}</p>
            <h3 class="post-title">
                <a href="{{ route('news.oneNews', ['id' => $key]) }}">{{ $new['title'] }}</a>
            </h3>
            </a>
            <p>{{ $new['desc'] }}</p>
            <p class="post-meta">Опубликовал
                <a href="#">{{ $new['author'] }}</a>
                в {{ $new['created_at']->format('d-m-Y H:i') }}</p>
        </div>
        @empty
        <h2>Новостей нет</h2>
        @endforelse
    </div>
</section>
@stop
