<?php
// config/config.php

return [
    'app' => [
        'name' => 'MUMBSO Connect',
        'url' => 'http://localhost:8000', // Update in production
        'env' => 'development', // 'production' or 'development'
    ],
    'db' => [
        'host' => 'localhost',
        'name' => 'mumbso_connect',
        'user' => 'root',
        'pass' => '',
        'charset' => 'utf8mb4',
    ],
    'daraja' => [
        'consumer_key' => 'YOUR_CONSUMER_KEY',
        'consumer_secret' => 'YOUR_CONSUMER_SECRET',
        'passkey' => 'YOUR_PASSKEY',
        'shortcode' => '174379',
        'callback_url' => 'http://your-domain.com/callback',
        'env' => 'sandbox', // 'sandbox' or 'production'
    ],
    'openai' => [
        'api_key' => 'YOUR_OPENAI_API_KEY',
    ]
];
