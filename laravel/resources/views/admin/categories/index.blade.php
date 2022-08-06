@extends ('layouts.admin')

@section('title')
    Управление категориями: @parent
@endsection

@section ('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список категорий</h1> &nbsp; <strong>
                <a href="{{ route('admin.categories.create') }}">Добавить категорию</a>
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
                    <th>Дата добавления</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>

                @forelse($catList as $category)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }} (Колл-во новостей: {{ $category->news->count() }})</td>
                        <td>{{ $category->slug }}</td>
                        <td>{{ $category->created_at }}</td>
                        <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Редактировать</a>
                            <hr>
                            <a href="{{ route('admin.categories.show', ['category' => $category]) }}">Просмотр</a>
                            <hr>
                            <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-dark">Удалить</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            {{ $catList->links() }}
        </div>



@endsection
