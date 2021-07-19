<?php

namespace Codemonkey76\Twilio;

use Illuminate\Support\ServiceProvider;

class TwilioServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/twilio.php' => config_path('twilio.php')], 'twilio');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/twilio.php', 'twilio');

        $this->app->bind(TwilioService::class, TwilioService::class);
    }
}
