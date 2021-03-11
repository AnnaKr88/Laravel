@extends('layouts.admin')

@section('title')
    Добавить категорию: @parent
@endsection

@section('content')
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить категорию</h1> &nbsp; <strong>
                <a href="{{ route('admin.categories.index') }}">Список категорий</a>
            </strong>
    </div>
   @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">
               {{ $error }}
           </div>
       @endforeach
   @endif
    <form action="{{ route('admin.categories.store') }}" method="POST">
       @csrf
       <div class="col-6">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" rows="8" cols="20" id="description" class="form-control"> </textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-success">Отправить</button>
        </div>

    </form>

@endsection
