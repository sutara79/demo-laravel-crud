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
        DB::table('users')->insert([
            'name' => 'jhon12',
            'email' => 'jhon12@foo.com',
            'password' => bcrypt('secret'),
        ]);
    }
}
