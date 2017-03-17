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
        'client_id' => '709234892592040',
        'client_secret' => '544ebfca0492af10842e617405ec339a',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '244251148865-ef1kuiqv34dbg1ulfb2l9t5kf9l0snjo.apps.googleusercontent.com',
        'client_secret' => 'h0sMH_Y3kJviGEqd2t0Z8fhU',
        'redirect' => 'http://localhost:8000/auth/google/callback',
    ],  
    'twitter' => [
        'client_id' => '2efPgjMLFqREIkc9SbZdAavAp',
        'client_secret' => 'OHDgqbGbccuTCwBARZqzMVzTa8VvRyU3VGaJRWwhos3p8rc1dy',
        'redirect' => 'http://localhost:8000/auth/twitter/callback',
    ],
];
