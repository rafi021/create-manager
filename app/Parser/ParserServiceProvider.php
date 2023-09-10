<?php

namespace App\Parser;

use Illuminate\Support\ServiceProvider;

class ParserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('parser', function ($app) {
            return new ParserManager($app);
        });
    }
}
