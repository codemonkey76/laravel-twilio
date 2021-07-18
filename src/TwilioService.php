<?php

namespace Codemonkey76\Twilio;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Rest\Client;
use Illuminate\Contracts\Config\Repository as Config;


class TwilioService
{
    protected string $from = '';
    protected string $to = '';
    protected Client $client;


    public static function make(): self
    {
        return app(static::class);
    }

    /**
     * @throws ConfigurationException
     */
    public function __construct(Config $config)
    {
        $this->client = new Client($config->get('account_sid'), $config->get('auth_token'));
    }

    public function from(string $from): self
    {
        $this->from = $from;
        return $this;
    }

    public function to(string $to): self
    {
        $this->to = $to;
        return $this;
    }

    public function message(string $message): bool
    {
        try {
            $this->client->messages->create($this->to, ['from' => $this->from, 'body' => $message]);
        } catch (\Exception $e) {
            return false;
        }
        return true;
    }
}
