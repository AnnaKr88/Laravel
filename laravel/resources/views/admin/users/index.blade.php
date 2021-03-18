@extends ('layouts.admin')
@section('title')
    Управление источниками: @parent
@endsection

@section ('content')
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Список пользователей</h1> &nbsp; <strong>
                <a href="{{ route('admin.users.create') }}">Добавить пользователя</a>
            </strong>
        </div>

        <!-- Content Row -->
        <div class="row">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#ID</th>
                    <th>Имя</th>
                    <th>Email</th>
                    <th>Дата добавления</th>
                    <th>Права</th>
                    <th>Действие</th>
                </tr>
                </thead>
                <tbody>
                @forelse($userList as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ ($user->rights)}}</td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Редактировать</a>
                            <hr>
                            <a href="{{ route('admin.users.show', ['user' => $user]) }}">Просмотр</a>
                            <hr>
                            <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST">
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
        </div>

@endsection

