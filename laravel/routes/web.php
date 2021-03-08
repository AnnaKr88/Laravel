<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\News\IndexController as NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Contacts\IndexController as ContactsController;
use App\Http\Controllers\Products\IndexController as ProductsController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ResourcesController;

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
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
	Route::get('/', [AdminController::class, 'index'])
		->name('index');
    Route::resource('categories', CategoriesController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('resources', ResourcesController::class);
});

Route::get('/', [IndexController::class, 'index'])
    ->name('main');

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
  Route::get('/', [NewsController::class, 'index'])
	  ->name('index');
  Route::get('/{id}', [NewsController::class, 'oneNews'])
	  ->where('id', '\d+')
	  ->name('oneNews');
  Route::get('/{cat}', [NewsController::class, 'oneCat'])
    ->name('oneCat');
});

Route::resource('/contacts', ContactsController::class);

Route::resource('/products', ProductsController::class);
