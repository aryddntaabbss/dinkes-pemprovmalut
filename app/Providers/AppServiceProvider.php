<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Profil;
use App\Models\Informasi;
use App\Models\DtaKesehatan;


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
        View::composer('layouts.main', function ($view) {
            $view->with('profilMenus', Profil::all());
            $view->with('informasilMenus', Informasi::all());
            $view->with('dakesMenus', DtaKesehatan::all());
        });
    }
}
