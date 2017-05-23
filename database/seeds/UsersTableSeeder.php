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
            'password' => bcrypt('secret1'),
        ]);
        DB::table('users')->insert([
            'name' => 'maria23',
            'email' => 'maria23@bar.org',
            'password' => bcrypt('secret2'),
        ]);
        DB::table('users')->insert([
            'name' => 'burton34',
            'email' => 'burton34@baz.net',
            'password' => bcrypt('secret3'),
        ]);
    }
}
