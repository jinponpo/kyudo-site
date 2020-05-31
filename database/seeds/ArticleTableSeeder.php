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

        DB::table('articles')->truncate();
        DB::table('articles')->insert([
            [
                'title'     => '青木公園弓道場',
                'body'      => '地元の高校生はここで練習をする',
                'pref'      => '埼玉県',
                'image'     => "http://localhost/images/aoki.jpg",
                'user_id'   => '1001',
                'created_at' => $faker->dateTimeThisMonth(),
            ],
            [
                'title'     => '日本ガイシスポーツプラザ日本ガイシホール',
                'body'      => '全日本学生弓道選手権大会の時に利用しました',
                'pref'      => '愛知県',
                'image'     => "http://localhost/images/gaisi.jpg",
                'user_id'   => '1002',
                'created_at' => $faker->dateTimeThisMonth(),
            ],
            [
                'title'     => '大宮運動公園弓道場',
                'body'      => '埼玉県の高校生はここで試合をする',
                'pref'      => '埼玉県',
                'image'     => "http://localhost/images/oomiya.jpg",
                'user_id'   => '1003',
                'created_at' => $faker->dateTimeThisMonth(),
            ],
            [
                'title'     => '伊勢神宮弓道場',
                'body'      => '弓道の聖地',
                'pref'      => '三重県',
                'image'     => "http://localhost/images/ise.jpeg",
                'user_id'   => '1004',
                'created_at' => $faker->dateTimeThisMonth(),
            ],
            [
                'title'     => '日本武道館',
                'body'      => '全日本学生弓道選手権大会、全関東学生弓道選手権大会の時の試合会場でした',
                'pref'      => '東京都',
                'image'     => "http://localhost/images/nihonbudoukan.jpg",
                'user_id'   => '1005',
                'created_at' => $faker->dateTimeThisMonth(),
            ],
        ]);
    }
}