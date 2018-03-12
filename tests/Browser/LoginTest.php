<?php
namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

// 忘れずにインポート
use App\User;

class LoginTest extends DuskTestCase
{
    // Dusk実行前にマイグレーションする
    use DatabaseMigrations;
    /**
     * ログイン機能をテストする
     *
     * @return void
     */
    public function testLogin()
    {
        // ユーザーを作成しておく
        $user = factory(User::class)->create([
            'email' => 'dusk@foo.com',
        ]);
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login') // ログインページへ移動
                    ->type('email', $user->email) // メールアドレスを入力
                    ->type('password', 'secret') // パスワードを入力
                    ->press('submit') // 送信ボタンをクリック
                    ->assertPathIs('/users/'.$user->id); // プロフィールページへ移動していることを確認
        });
    }
}