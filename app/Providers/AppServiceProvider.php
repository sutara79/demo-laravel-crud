<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // MySQL5.7.7、またはMariaDB10.2.2より古い場合、varchar型の文字数を191に制限する
        // See https://laravel.com/docs/5.6/migrations#indexes
        \Schema::defaultStringLength(191);

        // グローバル変数を設定する
        // See https://stackoverflow.com/questions/28356193/
        config(['admin_id' => 1]); // Use at app/User.php

        // HerokuでHTTPSを強制する
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // 本番環境以外で、Duskサービスプロバイダを登録する
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }
}
