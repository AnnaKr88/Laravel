@extends ('layouts.admin')

@section('title')
    Редактировать пользователя {{ $user->name }}: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать пользователя: {{ $user->name }}</h1> &nbsp; <strong>
            <a href="{{ route('admin.users.index') }}">Список пользователей</a>
        </strong>
    </div>
    <div>
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif
        <form action="{{ route('admin.users.update', ['user' => $user])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="form-group">

                    <label for="user">Сменить права</label>
{{--                    поправить формат --}}
                    <h5>Права: {{ $user->rights }}</h5>
                    <select name="rights" id="user" class="form-control">
                        <option value="admin">Администратор</option>
                        <option value="moder">Модератор</option>
                        <option value="user">Пользователь</option>
                        <option value="blocked">Заблокированный</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
                </div>
{{--                сделать смену пароля--}}
                <div class="form-group">
                    <label for="avatar">Аватар</label>
                    <img src="{{ $user->avatar }}" alt="" style="width:200px;">
                    <input type="file" name="avatar" id="avatar" class="form-control" value="Выбрать новый аватар">
                </div>

                <hr>
                <button type="submit" class="btn btn-success">Редактировать</button>
            </div>
        </form>
        <form action="{{ route('admin.users.destroy', ['user' => $user]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">Удалить</button>
        </form>
    </div>

@endsection
