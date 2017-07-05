<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Post;

class PostTest extends DuskTestCase
{
    // Run migration every before run Dusk.
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCRUD()
    {
        $user = factory(User::class)->create();
        $post = [
            'id' => 1,
            'title' => 'Post1',
            'body' => 'My First Post!',
        ];
        $update = [
            'title' => 'Update1',
            'body' => 'This post was updated.',
        ];
        $this->browse(function (Browser $browser) use ($user, $post, $update) {
            $browser->loginAs($user)
                    ->visit('/')

                    // Create
                    ->press('#new-post')
                    ->assertPathIs('/posts/create')
                    ->type('title', $post['title'])
                    ->type('body', $post['body'])
                    ->press('submit')
                    ->assertPathIs('/posts/'.$post['id'])
                    ->assertSeeIn('#post-title', $post['title'])
                    ->assertSeeIn('#post-body', $post['body'])

                    // Update
                    ->press('.edit .btn-primary')
                    ->assertPathIs('/posts/'.$post['id'].'/edit')
                    ->type('title', $update['title'])
                    ->type('body', $update['body'])
                    ->press('submit')
                    ->assertPathIs('/posts/'.$post['id'])
                    ->assertSeeIn('#post-title', $update['title'])
                    ->assertSeeIn('#post-body', $update['body'])

                    // Delete
                    ->press('.edit .btn-danger')
                    ->whenAvailable('.modal', function ($modal) {
                        $modal->press('.modal-footer .btn-danger')
                              ->assertPathIs('/posts');
                    });
        });
    }
}
