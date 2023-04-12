<?php
return [
    'merchant_id' => env('FREEDOMPAY_MERCHANT_ID'),
    'payment_secret_key' => env('FREEDOMPAY_PAYMENT_SECRET_KEY'),
    'p2p_secret_key' => env('FREEDOMPAY_P2P_SECRET_KEY'),
    'base_url' => env('FREEDOMPAY_BASE_URL', 'https://api.freedompay.money')
];
