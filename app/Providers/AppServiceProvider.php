<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Service;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Spatie\Translatable\Facades\Translatable;

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
        // Content entered in Arabic only still shows to English visitors (and vice versa)
        // instead of an empty title. The dashboard reads each language explicitly, so it is unaffected.
        Translatable::fallback(fallbackLocale: 'ar', fallbackAny: true);

        // The public footer lists services and certificate thumbnails on every page
        View::composer('landing.partials.footer', function ($view) {
            $view->with([
                'footerServices' => Service::where('is_active', 1)->orderBy('id', 'DESC')->take(5)->get(),
                'footerCertificates' => Certificate::where('is_active', 1)->whereNotNull('image')->orderBy('id', 'DESC')->take(6)->get(),
            ]);
        });
    }
}
