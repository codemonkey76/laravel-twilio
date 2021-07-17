<?php

namespace Codemonkey76\Twilio;

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
        info("sending message to: {$this->to} from {$this->from}");
        return true;
    }
}
