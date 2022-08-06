<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\Category;

class CategoriesNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('category_has_news')->insert($this->getData());
    }

    public  function getData(): array
    {
        $data=[];
        $news = News::select('id');
        $categories = Category::select('id');

        for($i=1; $i<=30; $i++)
        {
            $data[] = [
            'category_id' => mt_rand(1,5),
            'news_id' => $i
            ];
        };
        return $data;
    }
}
