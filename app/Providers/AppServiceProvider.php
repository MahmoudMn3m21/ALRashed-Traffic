<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        // Set application locale from session using view composer
        view()->composer('*', function ($view) {
            if (session()->has('locale')) {
                app()->setLocale(session('locale'));
            }
        });

        // Share categories for navbar dropdown (avoid query in console/API)
        view()->composer(['layouts.app'], function ($view) {
            if (!app()->runningInConsole() && !request()->is('admin*')) {
                $view->with('navCategories', Category::orderBy('name_en')->get());
            }
        });
    }
}
