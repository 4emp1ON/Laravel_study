<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData() :array
    {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i = 0; $i <= 5; $i++) {
            $data[] = [
                'name' => $faker->word(),
                'slug' => $faker->slug(mt_rand(1, 5)),
                'description' => $faker->realText(mt_rand(100, 200)),
            ];
        }
        return $data;
    }
}
