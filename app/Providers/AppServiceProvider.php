<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use App\Models\Departement;
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
        View::composer('auth.register', function ($view) {
            $departements = Departement::with('filieres')->get();
            $view->with('departements', $departements);
        });
    }
}
