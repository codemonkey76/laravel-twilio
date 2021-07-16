<?php

namespace Codemonkey76\Twilio;

use Illuminate\Support\ServiceProvider;

class TwilioServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__.'/../config/twilio.php' => config_path('twilio.php')], 'twilio-config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/twilio.php', 'twilio-config');
        $this->app->bind('twilio', fn($app) => new Twilio());
    }
}
