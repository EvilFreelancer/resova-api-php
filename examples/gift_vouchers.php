<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Resova\Client;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$config = new Config(['api_key' => getenv('API_KEY')]);
$resova = new Client($config);

// Single
$result = $resova->gift_voucher(123)->exec();
print_r($result);

// All
$result = $resova->gift_vouchers->all()->exec();
print_r($result);
