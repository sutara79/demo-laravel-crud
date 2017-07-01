<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PostTest extends TestCase
{
    /**
     * Display posts.index
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->get('users');
        $response->assertStatus(200);
    }

    /**
     * Display posts.show
     *
     * @return void
     */
    public function testShow()
    {

        $response = $this->get('users/1');
        $response->assertStatus(200);
    }
}
