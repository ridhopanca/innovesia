<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\GeneralInformation;

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
        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('general_information')) {
                    $view->with('generalInfo', GeneralInformation::first());
                } else {
                    $view->with('generalInfo', null);
                }
            } catch (\Exception $e) {
                $view->with('generalInfo', null);
            }
        });
    }
}
