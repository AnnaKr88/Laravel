<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
    {
        \DB::table('news')->insert($this->getData());
    }
    
    public function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data=[];
        
        for($i=0; $i<15; $i++)
        {
            $title = $faker->sentence(mt_rand(3,5));
			$data[] = [
				'title' => $title,
                'slug' => Str::slug($title),
                'description' => $faker->text(mt_rand(30, 200)),
                'info' => $faker->text(mt_rand(20, 50)),
				'created_at'  => now(),
				'updated_at'  => now()
			];
        }
        
        return $data;
    }
}
