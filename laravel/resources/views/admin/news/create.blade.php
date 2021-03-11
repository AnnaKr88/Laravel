@extends('layouts.admin')

@section('title')
    Добавить новость: @parent
@endsection

@section('content')
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить новость</h1> &nbsp; <strong>
                <a href="{{ route('admin.news.index') }}">Список новостей</a>
            </strong>
    </div>
   @if($errors->any())
       @foreach($errors->all() as $error)
           <div class="alert alert-danger">
               {{ $error }}
           </div>
       @endforeach
   @endif
    <form action="{{ route('admin.news.store')}}" method="POST">
       @csrf
       <div class="col-6">
           <div class="form-group">
               <label for="category">Выбор категории</label>
               <select class="form-control" name="category_title" id="category">
                   @forelse($category as $cat)
                       <option>{{ $cat->title }}</option>
                   @empty
                       <option>Нет категорий</option>
                   @endforelse
               </select>
           </div>
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="info">Краткое описание</label>
            <textarea name="info" rows="3" cols="5" id="description" class="form-control">{!! old('info') !!} </textarea>
          </div>
          <div >
            <label for="img">Выберите файл</label>
            <br>
            <input type="file" name="img" id="img">
          </div>
          <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" rows="8" cols="20" id="description" class="form-control">{!! old('description') !!} </textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-success">Отправить</button>
        </div>

    </form>

@endsection
