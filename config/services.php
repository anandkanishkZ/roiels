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
    | a conventional file to locate the various rule credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'facebook' => [
        'client_id'     => '380438822979478',
        'client_secret' => 'da126987e501aa2ca19c0f27920ebf05',
        'redirect'      => 'https://sidhadeal.com/login/facebook/callback',
    ],

    'google' => [
        'client_id'     => '419191561422-3k1m4bbr2glaa52ji6g1cl2vhu6muur3.apps.googleusercontent.com',
        'client_secret' => '6KJsPVHrtlTIrVRJNUx8rk2c',
        'redirect'      => 'http://sidhadeal.com/login/google/callback'
    ],

];
