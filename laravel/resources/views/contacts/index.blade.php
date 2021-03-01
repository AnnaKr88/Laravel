@extends('layouts.main')
@section('title')
    Contact us: @parent
@endsection
@section('content')
<section class="page-section cta">
    <div class="container">
      <h3>Свяжитесь с нами</h3>
      <form action="#" method="post">
        @csrf
        <div class="col-6">
          <div class="form-group">
            <label for="userName">Введите своё имя</label>
            <input type="text" name="name" id="userName" class="form-control">
          </div>
          <div class="form-group">
            <label for="userTel">Номер телефона</label>
            <input type="text" name="tel" value="" id="userTel" class="form-control">
          </div>
          <div class="form-group">
            <label for="userEmail">Электронный адрес</label>
            <input type="email" name="email" value="" id="userEmail" class="form-control">
          </div>
          <div class="form-group">
            <label for="userCom">Комментарий</label>
            <textarea name="userCom" rows="8" cols="20" id="userCom" class="form-control"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-success">Отправить</button>
        </div>
        
      </form>
    </div>
</section>
@stop
