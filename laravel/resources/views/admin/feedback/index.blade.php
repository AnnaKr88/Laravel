@extends('layouts.admin')
@section('title')
    Обратная связь: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список сообщений</h1> &nbsp;
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
                <th>Имя</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($feedbackList as $feedback)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $feedback->id }}</td>
                    <td>{{ $feedback->name }}</td>
                    <td>{{ $feedback->tel }}</td>
                    <td>{{ $feedback->email }}</td>
                    <td>{{ $feedback->created_at }}</td>
                    <td><a href="{{ route('admin.feedback.show', ['feedback' => $feedback]) }}">Просмотр</a>
                        <hr>
                        <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback]) }}" method="POST">
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
        {{ $feedbackList->links() }}
    </div>

@stop
