<?php

use Illuminate\Database\Seeder;

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
    private function getData() :array {
        $faker = \Faker\Factory::create('ru_RU');
        $data = [];
        for ($i=0; $i<=10; $i++) {
            $data[] = [
                'title' => $faker->words(mt_rand(2,5), true),
                'author' => $faker->firstName(),
                'body' => $faker->realText(mt_rand(100, 200)),
                'category_id' => $faker->numberBetween(1,5),
            ];
        }
        return $data;
    }
}
