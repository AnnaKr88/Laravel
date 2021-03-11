@extends('layouts.admin')
@section('title')
    Заказы: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Список заказов</h1> &nbsp;
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
                <th>Продукт</th>
                <th>Дата добавления</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @forelse($orderList as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->tel }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->product }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td><a href="{{ route('admin.order.show', ['order' => $order]) }}">Просмотр</a>
                        <hr>
                        <form action="{{ route('admin.order.destroy', ['order' => $order]) }}" method="POST">
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
        {{ $orderList->links() }}
    </div>

@stop
