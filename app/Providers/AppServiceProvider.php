<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Service;
use Illuminate\Support\Facades\View;
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
        // The public footer lists services and certificate thumbnails on every page
        View::composer('landing.partials.footer', function ($view) {
            $view->with([
                'footerServices' => Service::where('is_active', 1)->orderBy('id', 'DESC')->take(5)->get(),
                'footerCertificates' => Certificate::where('is_active', 1)->whereNotNull('image')->orderBy('id', 'DESC')->take(6)->get(),
            ]);
        });
    }
}
