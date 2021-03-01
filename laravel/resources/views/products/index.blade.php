@extends('layouts.main')
@section('title')
    Products: @parent
@endsection
@section('content')

<section class="page-section cta">
    <div class="container">

      <h3>Запрос на выгрузку</h3>
      <h4>{{ $message ?? '' }}</h4>
      <form action="{{ route('products.store') }}" method="post">
        @csrf
        <div class="col-6">
          <div class="form-group">
            <label for="userName">Введите своё имя</label>
            <input type="text" name="name" id="userName" class="form-control" pattern="^([A-Za-zА-Яа-я]+)$" required >
          </div>
          <div class="form-group">
            <label for="userTel">Номер телефона</label>
            <input type="tel" name="tel" placeholder="+7(000)0000000" id="userTel" class="form-control" required pattern="+7([0-9]{3})[0-9]{7}">
          </div>
          <div class="form-group">
            <label for="userEmail">Электронный адрес</label>
            <input type="email" name="email" placeholder="exemple@email.com" id="userEmail" class="form-control" pattern="^([A-Za-z0-9\._-]+)(@)([A-za-z0-9\.]+)(\.)([A-Za-z0-9\.-]{2,})$" required>
          </div>
          <div class="form-group">
            <p>Выберите файл</p>
            <p><input type="radio" name="pic" id="" value="pic_1"><img src="assets/img/pic/pic_1.jpg" alt="pic_1"></p>
            <p><input type="radio" name="pic" id="" value="pic_2"><img src="assets/img/pic/pic_2.jpg" alt="pic_2"></p>
            <p><input type="radio" name="pic" id="" value="pic_3"><img src="assets/img/pic/pic_3.jpg" alt="pic_3"></p>
          </div>
          <div class="form-group">
            <label for="userCom">Комментарий</label>
            <textarea name="userCom" rows="8" cols="20" id="userCom" class="form-control">{!! old('userCom') !!} </textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-success">Отправить</button>
        </div>
        
      </form>
    </div>
</section>
@stop