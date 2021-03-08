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

        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Slug</th>
                    <th>Источник</th>
                    <th>Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @forelse($catList as $cat)
                    <tr>
                        <td>{{ $cat->id }}</td>
                        <td>{{ $cat->title }}</td>
                        <td>{{ $cat->slug }}</td>
                        <td>{{ $cat->resource }}</td>
                        <td>{{ $cat->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>



@endsection
