<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

// 忘れずにインポート
use App\User;
use App\Post;

/**
 * Post(記事)に関するテスト
 */
class PostTest extends DuskTestCase
{
    // Dusk実行前にマイグレーションする
    use DatabaseMigrations;

    /**
     * 記事に関する操作(作成、編集、削除)のテスト
     *
     * @return void
     */
    public function testCRUD()
    {
        // ユーザーを作成
        $user = factory(User::class)->create();

        // 投稿する内容
        $post = factory(Post::class)->make([
            'id' => 1,
            'user_id' => $user->id, // 上で作成したユーザーを投稿者とする
        ]);

        // 編集する内容
        $update = factory(Post::class)->make();

        $this->browse(function (Browser $browser) use ($user, $post, $update) {
            $browser->loginAs($user) // ログインする
                    ->visit('/')

                    // 投稿
                    ->press('#new-post') // 「投稿する」ボタンを押す
                    ->assertPathIs('/posts/create') // 投稿ページであることを確認
                    ->type('title', $post->title) // 題名を入力
                    ->type('body', $post->body) // 本文を入力
                    ->press('submit') // 投稿する
                    ->assertPathIs('/posts/'.$post->id) // 記事ページであることを確認
                    ->assertSeeIn('#post-title', $post->title) // 題名を確認
                    ->assertSeeIn('#post-body', $post->body) // 本文を確認

                    // 編集
                    ->press('.edit .btn-primary') // 「編集」ボタンを押す
                    ->assertPathIs('/posts/'.$post->id.'/edit')
                    ->type('title', $update->title)
                    ->type('body', $update->body)
                    ->press('submit')
                    ->assertPathIs('/posts/'.$post->id)
                    ->assertSeeIn('#post-title', $update->title)
                    ->assertSeeIn('#post-body', $update->body)

                    // 削除
                    ->press('.edit .btn-danger') // 「削除」ボタンを押す
                    ->whenAvailable('.modal', function ($modal) { // モーダルが表示されるまで待つ
                        $modal->press('.modal-footer .btn-danger') // 「削除」ボタンを押す
                              ->assertPathIs('/posts'); // 一覧ページであることを確認
                    });
        });
    }

    /**
     * バリデーションの動作を確認する (createアクション)
     *
     * @return void
     */
    public function testValidationCreate()
    {
        // ユーザーを新規に作成・保存
        $user = factory(User::class)->create();

        // 投稿の作成のみを行う。保存はしない
        $post = factory(Post::class)->make([
            'title' => str_pad('', 200, 'a'),
        ]);

        // わざとバリデーション・エラーを起こす
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

    /**
     * バリデーションの動作を確認する (editアクション)
     *
     * @return void
     */
    public function testValidationEdit()
    {
        // ユーザーと投稿を新規に作成・保存
        $user = factory(User::class)->create();
        $post = factory(Post::class)->create();

        // わざとバリデーション・エラーを起こす
        $this->browse(function (Browser $browser) use ($user, $post) {
            $path = '/posts/'.$post->id.'/edit';
            $newTitle = str_pad('', 200, 'a');
            $browser->loginAs($user)
                    ->visit($path)
                    ->type('title', $newTitle)
                    ->press('submit')
                    ->assertPathIs($path)
                    ->assertInputValue('title', $newTitle);
        });
    }
}