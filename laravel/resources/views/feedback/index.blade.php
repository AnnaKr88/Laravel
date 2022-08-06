@extends('layouts.main')
@section('title')
    Contact us: @parent
@endsection
@section('content')
<section class="page-section cta">
    <div class="container">
      <h3>Свяжитесь с нами</h3>
        @if(session()->has('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @endforeach
        @endif

      <form action="{{ route('admin.feedback.store')}}" method="post">
        @csrf
        <div class="col-6">
          <div class="form-group">
            <label for="userName">Введите своё имя</label>
            <input type="text" name="name" id="userName" class="form-control" value="{{ old('name') }}">
          </div>
          <div class="form-group">
            <label for="userTel">Номер телефона (формат: 71112223333)</label>
            <input type="text" name="tel" value="{{ old('tel') }}" id="userTel" class="form-control" >
          </div>
          <div class="form-group">
            <label for="userEmail">Электронный адрес</label>
            <input type="email" name="email" value="{{ old('mail') }}" id="userEmail" class="form-control">
          </div>
          <div class="form-group">
            <label for="comment">Комментарий</label>
            <textarea name="comment" rows="8" cols="20" id="userCom" class="form-control">{!! old('comment') !!}</textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-success">Отправить</button>
        </div>

      </form>
    </div>
</section>
@stop
