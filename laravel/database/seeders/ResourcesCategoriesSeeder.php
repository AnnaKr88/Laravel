<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ResourcesCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('resources_has_categories')->insert($this->getData());
    }

    public  function getData(): array
    {
        $data=[];
        for($i=1; $i<=10; $i++)
        {
            $data[] = [
                'category_id' => mt_rand(1,5),
                'resource_id' => $i
            ];
        };
        return $data;
    }
}
