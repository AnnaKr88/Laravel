<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class ResourcesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resources')->insert($this->getData());
    }
    
    public function getData(): array
    {
        $faker = Factory::create('ru_RU');
        $data=[];
        
        for($i=0; $i<10; $i++)
        {
            $title = $faker->sentence(mt_rand(3,10));
			$data[] = [
				'title' => $title,
				'description' => $faker->text(mt_rand(100, 200)),
                'info' => $faker->text(mt_rand(20, 50)),
				'created_at'  => now(),
				'updated_at'  => now()
			];
        }
        
        return $data;
    }
}
