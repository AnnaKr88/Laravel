@extends('layouts.admin')
@section('title')
    Добавить пользователя: @parent
@endsection

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Добавить пользователя</h1> &nbsp; <strong>
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
        <form action="{{ route('admin.users.store')}}" method="POST">
            @csrf
            <div class="col-6">
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="form-group">

                    <label for="user">Права</label>
                    <select name="rights" id="user" class="form-control">
                        <option value="admin">Администратор</option>
                        <option value="moder">Модератор</option>
                        <option value="user">Пользователь</option>
                        <option value="blocked">Заблокированный</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Аватар</label>
                    <input type="file" name="avatar" id="avatar" class="form-control" value="Выбрать аватар">
                </div>

                <hr>
                <button type="submit" class="btn btn-success">Добавить</button>
            </div>
        </form>
    </div>

@endsection
