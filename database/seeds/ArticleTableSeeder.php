<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        // ランダムに記事を作成
        for ($i = 0; $i < 10; $i++)
        {
            DB::table('articles')->insert([
                'title' => '私の出身地',
                'body' => $faker->country,
                'user_id' => $faker->numberBetween(1, 10),
                'created_at' => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}