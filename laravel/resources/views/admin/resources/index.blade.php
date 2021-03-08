@extends ('layouts.admin')
@section('title')
    Управление источниками: @parent
@endsection

@section ('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список источников</h1> &nbsp; <strong>
                <a href="{{ route('admin.resources.create') }}">Добавить источник</a>
            </strong>
        </div>

        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Заголовок</th>
                    <th>Инфо</th>
                    <th>Дата добавления</th>
                </tr>
                </thead>
                <tbody>
                @forelse($resList as $res)
                    <tr>
                        <td>{{ $res->id }}</td>
                        <td>{{ $res->title }}</td>
                        <td>{{ $res->info }}</td>
                        <td>{{ $res->created_at }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">
                            <h2>Записей нет</h2>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

@endsection

