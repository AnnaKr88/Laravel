<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use App\Services\FakeNewsService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
  public function index(){
      $data = News::select()
          ->with('category')
          ->paginate(9);

    return view('news.index', [
			'listNews' => $data
		]);
    }

//  public function oneNews(FakeNewsService $service, int $id) {
//    $allNews = $service->getNews();
//		$news =  $allNews[$id] ?? "Not found";
//        return view('news.oneNews', [
//        	'news' => $news
//		]);
//  }
//
//  public function oneCat(FakeNewsService $service, $cat) {
//    $allNews = $service->getNews();
//    $oneCat = $service->getCat($allNews, $cat);
//    //dd($oneCat);
//    $news = $oneCat ?? "Not found";
//        return view('news.oneCat', [
//          'news' => $news
//        ]);
//  }
}
