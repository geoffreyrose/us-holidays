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
        $this->app->singleton(\USHolidays\Carbon::class, function ($app) {
            return new \USHolidays\Carbon();
        });

        $this->app->alias(\USHolidays\Carbon::class, 'usholidays');
    }
}
