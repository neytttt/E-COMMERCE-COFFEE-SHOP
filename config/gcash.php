<?php

return [
    'sandbox' => env('GCASH_SANDBOX', true),
    'app_id' => env('GCASH_APP_ID', ''),
    'app_secret' => env('GCASH_APP_SECRET', ''),
    'merchant_id' => env('GCASH_MERCHANT_ID', ''),
    'callback_url' => env('GCASH_CALLBACK_URL', ''),
];