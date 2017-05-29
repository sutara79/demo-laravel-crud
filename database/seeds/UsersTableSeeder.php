<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
        DB::table('users')->insert([
            'name' => 'sutara79',
            'email' => 'toumin.m7@gmail.com',
            'password' => bcrypt('1234'),
            'created_at' => $faker->dateTime(),
            'updated_at' => $faker->dateTime(),
        ]);
        for ($i = 0; $i < 20; $i++)
        {
            DB::table('users')->insert([
                'name' => $faker->unique()->userName(),
                'email' => $faker->unique()->email(),
                'password' => bcrypt('1234'),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}
