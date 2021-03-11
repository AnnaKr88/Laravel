@extends ('layouts.admin')

@section('title')
    Просмотр {{ $category->title }}: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Просмотр: {{ $category->title }}</h1> &nbsp; <strong>
            <a href="{{ route('admin.categories.index') }}">Список категорий</a>
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
                <th>Описание</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }} (Колл-во новостей: {{ $category->news->count() }})</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Редактировать</a>
                        <hr>
                        <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark">Удалить</button>
                        </form></td>
                </tr>
            </tbody>
        </table>
    </div>



@endsection
