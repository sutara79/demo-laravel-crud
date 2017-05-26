<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Use Faker
        // https://github.com/fzaninotto/Faker
        $faker = Faker\Factory::create('ja_JP');
        for ($i = 0; $i < 20; $i++)
        {
            DB::table('posts')->insert([
                'name' => $faker->text(20),
                'body' => $faker->text(200),
            ]);
        }
    }
}
