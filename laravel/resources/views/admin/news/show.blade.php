@extends ('layouts.admin')

@section('title')
    Просмотр {{ $news->title }}: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Просмотр: {{ $news->title }}</h1> &nbsp; <strong>
            <a href="{{ route('admin.news.index') }}">Список Новостей</a>
        </strong>
    </div>

    <!-- Content Row -->
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
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
                <tr>
                    <td>{{ $news->id }}</td>
                    <td>{{ $news->title }}</td>
                    <td>{{ $news->slug }}</td>
                    <td>{{ $news->category }}</td>
                    <td>{{ $news->info }}</td>
                    <td>{{ $news->created_at }}</td>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Редактировать</a>
                        <hr>
                        <form action="{{ route('admin.news.destroy', ['news' => $news]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark">Удалить</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



@endsection
