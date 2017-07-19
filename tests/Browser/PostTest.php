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
        $post = factory(Post::class)->make([
            'id' => 1,
            'user_id' => $user->id,
        ]);
        $update = factory(Post::class)->make();

        $this->browse(function (Browser $browser) use ($user, $post, $update) {
            $browser->loginAs($user)
                    ->visit('/')

                    // Create
                    ->press('#new-post')
                    ->assertPathIs('/posts/create')
                    ->type('title', $post->title)
                    ->type('body', $post->body)
                    ->press('submit')
                    ->assertPathIs('/posts/'.$post->id)
                    ->assertSeeIn('#post-title', $post->title)
                    ->assertSeeIn('#post-body', $post->body)

                    // Update
                    ->press('.edit .btn-primary')
                    ->assertPathIs('/posts/'.$post->id.'/edit')
                    ->type('title', $update->title)
                    ->type('body', $update->body)
                    ->press('submit')
                    ->assertPathIs('/posts/'.$post->id)
                    ->assertSeeIn('#post-title', $update->title)
                    ->assertSeeIn('#post-body', $update->body)

                    // Delete
                    ->press('.edit .btn-danger')
                    ->whenAvailable('.modal', function ($modal) {
                        $modal->press('.modal-footer .btn-danger')
                              ->assertPathIs('/posts');
                    });
        });
    }

    /**
     * Make sure to display validation error on create page.
     *
     * @return void
     */
    public function testValidate()
    {
        $user = factory(User::class)->create();
        $post = factory(Post::class)->make([
            'title' => str_pad('', 200, 'a'),
        ]);
        $this->browse(function (Browser $browser) use ($user, $post) {
            $browser->loginAs($user)
                    ->visit('/posts/create')
                    ->type('title', $post->title)
                    ->type('body', $post->body)
                    ->press('submit')
                    ->assertPathIs('/posts/create')
                    ->assertInputValue('title', $post->title);
        });
    }
}
