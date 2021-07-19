    <?php

return [
    'account_sid' => getenv('TWILIO_ACCOUNT_SID'),
    'auth_token' => getenv('TWILIO_AUTH_TOKEN'),
    'status_callback' => getenv('TWILIO_STATUS_CALLBACK')
];
