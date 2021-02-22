<?php


namespace App\Services;


use Faker\Factory;

class FakeNewsService
{
   public $cat = [
      'cat_1',
      'cat_2',
      'cat_3'
   ];

   public function getNews(): array
   {
   	   $news = [];
   	   $faker = Factory::create('ru_RU');
   	   for($i=0; $i < 9;  $i++) {
   	   	  $news[] = [
                      'title' => $faker->jobTitle,
                      'desc'=> $faker->text(50),
                      'text' => $faker->text(500),
                      'cat' => $this->cat[array_rand($this->cat, 1)],
                      'author' => $faker->firstName . " " . $faker->lastName,
                      'created_at' => now()
		  ];
	   }
   	   return $news;
   }

   public function getCat($allNews, $cat){
     $oneCat = [];
     $allNews = $this->getNews();
     foreach($allNews as $news){
        if(array_search($cat, $news)) {
           array_push($oneCat, $news);
        }
     }
     return $oneCat;
   }
}
