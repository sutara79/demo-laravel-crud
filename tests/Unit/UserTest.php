<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class UserTest extends TestCase
{
    /**
     * Test App\User::isAdmin
     *
     * @return void
     */
    public function testIsAdmin()
    {
        // id:1 is admin
        $user = User::find(1);
        $this->assertTrue($user->isAdmin());

        // id:2 is not admin
        $user = User::find(2);
        $this->assertFalse($user->isAdmin());
    }
}
