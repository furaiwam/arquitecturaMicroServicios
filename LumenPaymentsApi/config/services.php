<?php

return [
    'orders' => [
        'base_uri' => env('ORDERS_SERVICE_BASE_URL'),
        'secret' => env('ORDERS_SERVICE_SECRET'),
    ],
    'users' => [
        'base_uri' => env('USERS_SERVICE_BASE_URL'),
        'secret' => env('USERS_SERVICE_SECRET'),
    ],
];
