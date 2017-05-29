<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Force HTTPS on Heroku
        // See http://www.jeffmould.com/2016/01/31/laravel-5-2-forcing-https-routes-when-using-ssl/
        if (!\App::environment('local')) {
            \URL::forceScheme('https');
        }

        // For MySQL < 5.7.7 or MariaDB < 10.2.2
        // See https://github.com/laravel/framework/issues/17508
        \Schema::defaultStringLength(191);

        // For SQLite
        // See https://laravel10.wordpress.com/2015/02/24/sqlite-%E3%81%A7%E5%A4%96%E9%83%A8%E3%82%AD%E3%83%BC%E5%88%B6%E7%B4%84foreign-key%E3%81%8C%E5%8A%B9%E3%81%8B%E3%81%AA%E3%81%84%E6%99%82/
        // if (\DB::connection() instanceof \Illuminate\Database\SQLiteConnection) {
        if (\DB::getDriverName() == 'sqlite') {
            \DB::statement(\DB::raw('PRAGMA foreign_keys=1'));
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
