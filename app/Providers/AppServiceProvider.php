<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use \App\Models\Admin\Categories;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        //
        view()->composer('*',function($view){
            $view->with([
                'category'=> Categories::all(),
            ]);
        });
        Paginator::useBootstrapFive();
    }
}
