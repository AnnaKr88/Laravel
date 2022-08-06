@extends('layouts.admin')
@section('title')
    Добавить источник: @parent
@endsection

@section('content')
   <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Добавить источник</h1> &nbsp; <strong>
                <a href="{{ route('admin.resources.index') }}">Список источников</a>
            </strong>
    </div>
    <form action="{{ route('admin.resources.store')}}" method="POST">
       @csrf
       <div class="col-6">
          <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control">
          </div>
          <div class="form-group">
            <label for="info">Краткое описание</label>
            <textarea name="description" rows="3" cols="5" id="description" class="form-control">{!! old('userCom') !!} </textarea>
          </div>
          <div class="form-group">
            <label for="description">Описание</label>
            <textarea name="description" rows="8" cols="20" id="description" class="form-control">{!! old('userCom') !!} </textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-success">Отправить</button>
        </div>
        
    </form>

@endsection