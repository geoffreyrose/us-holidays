<?php

namespace USHolidays;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(USHolidays::class, function ($app) {
            return new USHolidays();
        });

        $this->app->alias(USHolidays::class, 'usholidays');
    }
}
