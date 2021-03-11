@extends ('layouts.admin')

@section('title')
    Просмотр {{ $order->name }}: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form action="{{ route('admin.order.destroy', ['order' => $order]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-dark">Удалить</button>
        </form>
        <h1 class="h3 mb-0 text-gray-800">Просмотр заказа, автор: {{ $order->name }}</h1> &nbsp; <strong>
            <a href="{{ route('admin.order.index') }}">Список заказов</a>
        </strong>
    </div>

    <!-- Content Row -->
    <div class="border">
        <div> <b>Телефон:</b> {{ $order->tel }}</div>
        <hr>
        <div><b>Email</b>: {{ $order->email }}</div>
        <hr>
        <div><b>Продукт</b>: {{ $order->product }}</div>
        <hr>
        <div><b>Комментарий:</b> {{ $order->comment }}</div>
    </div>
@endsection
