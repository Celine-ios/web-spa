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
        'domain' => env('mg.emotionfitcenter.com'),
        'secret' => env('key-69e856977e2a33fc0c06f58acc5d888d'),
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
        'client_id' => '1864667623808039',
        'client_secret' => '1d6ca4da2f688ebb3ebe58d647e479d0',
        'redirect' => 'http://tauret.exala.co/auth/facebook/callback',
        // 'redirect' => 'http://tauret.exala.co/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '172872949320-gh46rngh1ua4dgckuhsqooecavso83cm.apps.googleusercontent.com',
        'client_secret' => 'SZFAKnF0r08Hxkpt-eQvIcGe',
        'redirect' => 'http://tauret.exala.co/auth/google/callback',
    ],

];
