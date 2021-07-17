<?php

namespace Codemonkey76\Twilio;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Twilio\Security\RequestValidator;

class TwilioRequestValidator
{
    public function handle(Request $request, Closure $next)
    {
        $requestValidator = new RequestValidator(config('twilio.auth_token'));

        $requestData = $request->toArray();

        if (array_key_exists('bodySHA256', $requestData)) {
            $requestData = $request->getContent();
        }

        $isValid = $requestValidator->validate(
            $request->header('X-Twilio-Signature'),
            $request->fullUrl(),
            $requestData
        );

        if ($isValid) {
            return $next($request);
        } else {
            return new Response('You are not Twilio :(', 403);
        }
    }
}
