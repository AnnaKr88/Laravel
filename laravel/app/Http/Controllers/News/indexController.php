<?php

namespace App\Http\Controllers\News;

use App\Services\FakeNewsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
  public function index(FakeNewsService $service){
    return view('news.index', [
			'listNews' => $service->getNews()
		]);
    }

  public function oneNews(FakeNewsService $service, int $id) {
    $allNews = $service->getNews();
		$news =  $allNews[$id] ?? "Not found";
        return view('news.oneNews', [
        	'news' => $news
		]);
  }

  public function oneCat(FakeNewsService $service, $cat) {
    $allNews = $service->getNews();
    $oneCat = $service->getCat($allNews, $cat);
    //dd($oneCat);
    $news = $oneCat ?? "Not found";
        return view('news.oneCat', [
          'news' => $news
        ]);
  }
}
