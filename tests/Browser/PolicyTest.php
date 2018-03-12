<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

// 忘れずにインポート
use App\User;
use App\Post;

class PolicyTest extends DuskTestCase
{
    // Dusk実行前にマイグレーションする
    use DatabaseMigrations;

    /**
     * オーナーではない記事を普通のユーザーが編集しようとする
     *
     * @return void
     */
    public function test403()
    {
        // ID2のユーザーを作成
        $user = factory(User::class)->create([
            'id' => 2,
        ]);
        // ID100のユーザーを作成
        factory(User::class)->create([
            'id' => 100,
        ]);
        // ID100による記事を作成
        $post = factory(Post::class)->create([
            'user_id' => 100,
        ]);

        // オーナーではない記事を編集しようとする
        // 403 Forbidden となる
        $this->browse(function (Browser $browser) use ($user, $post) {
            $browser->loginAs($user)
                    ->visit('/posts/'.$post->id.'/edit')
                    ->assertSeeIn('.error-code', '403');
        });
    }

    /**
     * オーナーではない記事を管理者が編集しようとする
     *
     * @return void
     */
    public function testAdmin()
    {
        // ID1のユーザーを作成
        $user = factory(User::class)->create([
            'id' => 1,
        ]);
        // ID100のユーザーを作成
        factory(User::class)->create([
            'id' => 100,
        ]);
        // ID100による記事を作成
        $post = factory(Post::class)->create([
            'user_id' => 100,
        ]);

        // オーナーではない記事を編集しようとする
        // 管理者なので編集可能
        $this->browse(function (Browser $browser) use ($user, $post) {
            $newTitle = 'I am an admin.';
            $browser->loginAs($user)
                    ->visit('/posts/'.$post->id.'/edit')
                    ->type('title', $newTitle)
                    ->press('submit')
                    ->assertPathIs('/posts/'.$post->id)
                    ->assertSeeIn('#post-title', $newTitle);
        });
    }
}