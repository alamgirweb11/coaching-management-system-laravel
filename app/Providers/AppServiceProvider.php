<?php

namespace App\Providers;

use App\HeaderFooter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
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
             // $header = HeaderFooter::find(3);
             $header = DB::table('header_footers')->first();
              $view->with([
                  'user'=>$user,
                  'header'=>$header,
                  ]);
        });
        // for show the header information dynamically
        // View::composer('admin.includes.header', function($view){
        //       $header = HeaderFooter::find(2);
        //       $view->with('header',$header);
        // });
        // for show the footer information dynamically     
        View::composer('admin.includes.footer', function($view){
            //   $footer = HeaderFooter::find(2);
            $footer = DB::table('header_footers')->first();
              $view->with('footer',$footer);
        });

    }
}
