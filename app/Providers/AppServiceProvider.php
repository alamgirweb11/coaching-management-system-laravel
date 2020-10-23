<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use Auth;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('admin.includes.header', function($view){
              $user = Auth::user();
              $view->with('user',$user);
        });
    }
}
