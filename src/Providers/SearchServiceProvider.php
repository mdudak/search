<?php

namespace Konekt\Search\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Konekt\Search\SearchFactory;

class SearchServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton('konekt-search', function () {
            return new SearchFactory();
        });
    }
}
