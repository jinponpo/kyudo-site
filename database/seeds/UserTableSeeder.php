<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');
        
        for ($i = 0; $i < 5; $i++)
        {
            DB::table('users')->insert([
                'id' => $faker->unique()->numberBetween(1001, 1005),
                'name' => $faker->unique()->name(),
                'email' => $faker->unique()->safeEmail,
                'created_at' => $faker->dateTime(),
            ]);
        }
    }
}
