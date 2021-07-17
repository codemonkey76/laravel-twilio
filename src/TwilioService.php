<?php

namespace Codemonkey76\Twilio;

use Twilio\Rest\Client;

class TwilioService
{
    protected string $from = '';
    protected string $to = '';

    public function from(string $from): TwilioService
    {
        $this->from = $from;
        return $this;
    }

    public function to(string $to): TwilioService
    {
        $this->to = $to;
        return $this;
    }

    public function message(string $message): bool
    {
        $client = new Client(config('twilio.account_sid'), config('twilio.auth_token'));

        $client->messages->create($this->to, ['from' => $this->from, 'body' => $message]);
        info("sending message to: {$this->to} from {$this->from}");
        return true;
    }
}
