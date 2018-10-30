<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '213332769454037',
        'client_secret' => '1d2579db86b0a9dbf081d894a64e2b72',
        'redirect' => 'http://localhost:8001/login/facebook/callback',
    ],

    'google' => [
    'client_id' => '77619144478-3m7qnu9961rq1udv7ofiq9tvjkqaakjq.apps.googleusercontent.com',
    'client_secret' => 'wsG8yVKmIqNWsDXO1wbyYYzG',
    'redirect' => 'http://localhost:8001/login/google/callback',
    ],

];
