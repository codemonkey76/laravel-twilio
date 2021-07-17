<?php

namespace Codemonkey76\Twilio;

class TwilioService
{
    public function sendMessage(string $from, string $to, string $message): bool
    {
        info("sending message to: {$to} from {$from}");
        return true;
    }
}
