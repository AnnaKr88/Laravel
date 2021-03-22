<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\IndexController;
use App\Http\Controllers\News\IndexController as NewsController;
use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ResourcesController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Account\IndexController as AccountController;
use App\Http\Controllers\Admin\UsersController;
use \App\Http\Controllers\SocialiteController;

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
Route::group(['middleware' => 'auth'], function (){
    Route::get('/account', AccountController::class)
        ->name('account');
    Route::group(['middleware' => 'admin'], function (){
        Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
            Route::get('/', [AdminController::class, 'index'])
                ->name('index');
            Route::resource('categories', CategoriesController::class);
            Route::resource('news', AdminNewsController::class);
            Route::resource('resources', ResourcesController::class);
            Route::resource('feedback', FeedbackController::class);
            Route::resource('order', OrderController::class);
            Route::resource('users', UsersController::class);
        });
    });
});

Route::get('/', [IndexController::class, 'index'])
    ->name('main');

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
  Route::get('/', [NewsController::class, 'index'])
	  ->name('index');
//  Route::get('/{id}', [NewsController::class, 'oneNews'])
//	  ->where('id', '\d+')
//	  ->name('oneNews');
//  Route::get('/{cat}', [NewsController::class, 'oneCat'])
//    ->name('oneCat');
});

Route::get('/feedback', function ()
{
    return view('feedback.index');
})
    ->name('feedback');
Route::get('/products', function ()
{
    return view('products.index');
})
    ->name('products');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

Route::group(['middleware' => 'guest'], function(){
    Route::get('/auth/vk', [SocialiteController::class, 'init'])
    ->name('vk.init');
    Route::get('/auth/vk/callback', [SocialiteController::class, 'callback'])
        ->name('vk.callback');
});
