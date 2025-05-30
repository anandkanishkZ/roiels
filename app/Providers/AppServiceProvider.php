<?php

namespace App\Providers;

use App\Models\About;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\Content;
use App\Models\Course;
use Cassandra\DefaultSchema;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        \Illuminate\Support\Facades\View::composer('*', function($view){
        $view->with('configuration', Configuration::first());
        $view->with('menus', Category::where('status', 1)->orderBy('rank', 'asc')->get());
        });
    }
}
