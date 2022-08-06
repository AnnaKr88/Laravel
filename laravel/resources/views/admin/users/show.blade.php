@extends ('layouts.admin')

@section('title')
    Профиль пользователя {{ $user->name }}: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Профиль: {{ $user->name }}</h1> &nbsp; <strong>
            <a href="{{ route('admin.users.index') }}">Список пользователей</a>
        </strong>
    </div>

    <!-- Content Row -->
    <div class="row">

        <a href="{{ route('admin.users.edit', ['user' => $user]) }}">Редактировать</a>
        <hr>
        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">Удалить</button>
        </form>
    </div>
        <div>
            <h5>Имя: {{ $user->name }}</h5>
        </div>
        <div>
            <h5>Права: {{ $user->rights }}</h5>
        </div>
        <div>
            <h5>Email: {{ $user->email }}</h5>
        </div>
        <div>
            <h5>Аватар</h5>
            <img src="{{ $user->avatar }}" alt="">
        </div>
@endsection
