<?php

/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

//return [
//    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
//    'sandbox' => [
//        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', ''),
//        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', ''),
//        'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', 'AaVlBLOqaLoyEUWE6s1BMiHF_ETbhfLK44UKfiPm1YO_So0xRe6hDjIBwHDMcKwHHostJaM6D5-0622k'),
//        'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EMiNqrAAgLIDT5OBzPsB0Q791vHiqpm95HePI_iPlkwc27VCEHBqZA9AM4KO-5kZBn_eR5ZNzP_9TE5B'),
//        'app_id'            => 'APP-80W284485P519543T',
//    ],
//    'live' => [
//        'username'    => env('PAYPAL_LIVE_API_USERNAME', ''),
//        'password'    => env('PAYPAL_LIVE_API_PASSWORD', ''),
//        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
//        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
//        'secret'      => env('PAYPAL_LIVE_API_SECRET', ''),
//        'certificate' => env('PAYPAL_LIVE_API_CERTIFICATE', ''),
//        'app_id'            => '',
//    ],
//    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
//    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
//    'billing_type'   => 'MerchantInitiatedBilling',
//    'notify_url'     => '', // Change this accordingly for your application.
//    'locale'         => 'en_US', // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
//    'validate_ssl'   => true
//];


return [
    'client_id' => env('PAYPAL_SANDBOX_CLIENT_ID','AaVlBLOqaLoyEUWE6s1BMiHF_ETbhfLK44UKfiPm1YO_So0xRe6hDjIBwHDMcKwHHostJaM6D5-0622k'),
    'secret' => env('PAYPAL_SANDBOX_CLIENT_SECRET','EMiNqrAAgLIDT5OBzPsB0Q791vHiqpm95HePI_iPlkwc27VCEHBqZA9AM4KO-5kZBn_eR5ZNzP_9TE5B'),
    'currency' => env('PAYPAL_CURRENCY', 'USD'),
    'mode' => 'sandbox'
];