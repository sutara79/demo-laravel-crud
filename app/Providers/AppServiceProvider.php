<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // グローバル変数
        // 管理者のID番号を1とする
        // 参照: https://stackoverflow.com/questions/28356193/
        config(['admin_id' => 1]);
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
