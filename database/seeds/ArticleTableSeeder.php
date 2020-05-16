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
        for ($i = 0; $i < 20; $i++)
        {
            DB::table('articles')->insert([
                'title' => $faker->text(10),
                'body' => $faker->realtext(20),
                'user_id' => $faker->numberBetween(1, 20),
                'created_at' => $faker->dateTimeThisMonth(),
            ]);
        }
    }
}