<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'paystack' => [
        'base_url' => env('PAYSTACK_BASE_URL'),
        'secret' => env('PAYSTACK_SECRET_KEY'),
        'callback' => env('PAYSTACK_CALLBACK_URL', 'us-east-1'),
    ],

    'image_url' => [env('IMAGE_URL', 'https://event-reservation-system.herokuapp.com/storage/file/random0293ke3.jpg')],

    'email' => [
        'from_address' => env('FROM_ADDRESS'),
        'from_name' => env('FROM_NAME'),
        'mailgun_api_key' => env('MAILGUN_API_KEY'),
        'mailgun_url' => env('MAILGUN_URL', 'mg.mockup.com.ng'),
    ],

];
