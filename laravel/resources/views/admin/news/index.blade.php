@extends ('layouts.admin')
@section('title')
    Управление новостями: @parent
@endsection

@section ('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список новостей</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.create') }}">Добавить новость</a>
            </strong>
        </div>

        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif

        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>№</th>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Slug</th>
                    <th>Категория</th>
                    <th>Инфо</th>
                    <th>Дата добавления</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($newsList as $news)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $news->id }}</td>
                        <td>{{ $news->title }}</td>
                        <td>{{ $news->slug }}</td>
                        <td>{{ $news->category }}</td>
                        <td>{{ $news->info }}</td>
                        <td>{{ $news->created_at }}</td>
                        <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a>
                            <hr>
                            <a href="{{ route('admin.news.show', ['news' => $news]) }}">Просмотр</a>
                            <hr>
                            <form action="{{ route('admin.news.destroy', ['news' => $news]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $newsList->links() }}
        </div>

@endsection
