<?php

// src/DemoServiceProvider.php

namespace track_referrer\Demo;

use Illuminate\Support\ServiceProvider;

class DemoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('track_referrer_demo', function() {
            return new Demo();
        });
    }

    public function boot()
    {
        require __DIR__ . '/Http/routes.php';
    }
}
