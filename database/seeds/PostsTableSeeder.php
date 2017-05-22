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
        DB::table('posts')->insert([
            'name' => 'Test Post1',
            'body' => 'Hello World!',
        ]);
        DB::table('posts')->insert([
            'name' => 'Test Post2',
            'body' => 'My first Laravel.',
        ]);
    }
}
