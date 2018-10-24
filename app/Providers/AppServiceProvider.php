<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use Omnipay\Omnipay;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        User::created(function($model) {
            $model->access_key = bin2hex(random_bytes(16));
            $model->balance = 123;
            $model->save();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }
}
