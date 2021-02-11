<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return '<a href="/greetings">Приветствие</a>
    <a href="/info">Инфо</a>
    <a href="/news">Новости</a>';
});

Route::get('/greetings', function(){
    return "greetings".'<br><a href="/">Back</a>';
});

Route::get('/info', function(){
    return "info".'<br><a href="/">Back</a>';
});

Route::get('/news', function(){
    return '<a href="/news/{new1}">Новость_1</a>'.'<br><a href="/">Back</a>';
});

Route::get('/news/{new1}', function(){
    return "new1".'<br><a href="/news">Back</a>';
});