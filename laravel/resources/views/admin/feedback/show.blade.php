@extends ('layouts.admin')

@section('title')
    Просмотр {{ $feedback->name }}: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form action="{{ route('admin.feedback.destroy', ['feedback' => $feedback]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">Удалить</button>
        </form>
        <h1 class="h3 mb-0 text-gray-800">Просмотр сообщения, автор: {{ $feedback->name }}</h1> &nbsp; <strong>
            <a href="{{ route('admin.feedback.index') }}">Список сообщений</a>
        </strong>
    </div>

    <!-- Content Row -->
    <div class="border">
        <div> <b>Телефон:</b> {{ $feedback->tel }}</div>
        <hr>
        <div><b>Email</b>: {{ $feedback->email }}</div>
        <hr>
        <div><b>Комментарий:</b> {{ $feedback->comment }}</div>

    </div>



@endsection
