@extends ('layouts.admin')

@section('title')
    Редактировать категорию: @parent
@endsection

@section ('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Редактировать категорию</h1> &nbsp; <strong>
            <a href="{{ route('admin.categories.index') }}">Список категорий</a>
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
        <form action="{{ route('admin.categories.update', ['category' => $category])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-6">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
                </div>
                <div class="form-group">
                    <label for="description">Описание</label>
                    <textarea name="description" rows="8" cols="20" id="description" class="form-control">{!! $category->description !!}  </textarea>
                </div>
                <hr>
                <button type="submit" class="btn btn-success">Редактировать</button>
            </div>
        </form>
            <form action="{{ route('admin.categories.destroy', ['category' => $category]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-dark">Удалить</button>
            </form>
    </div>


@endsection
