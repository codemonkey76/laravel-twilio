<?php

namespace Codemonkey76\Twilio\Facades;

use Illuminate\Support\Facades\Facade;

class TwilioFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'twilio';
    }
}
