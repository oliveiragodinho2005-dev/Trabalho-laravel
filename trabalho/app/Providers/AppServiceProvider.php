<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{

    public function register(): void
    {

    }


    public function boot(): void
    {
        if (config('app.url') !== 'http://localhost'){
            URL::forceRootUrl(config('app.url'));
            URL::forceScheme('https');
        }
    }
}