<?php

namespace App\Providers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        Schema::defaultStringLength(191);
        if(!Cookie::has('CODE_SEARCH')){
            Cookie::queue('CODE_SEARCH' , 'CODE_SEARCH_'.jdate()->getTimestamp() , jdate()->getTimestamp() + 9999999999999999);
        }
    }
}
