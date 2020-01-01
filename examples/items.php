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
$result = $resova->item(1)->exec();
print_r($result);

// Single: Reviews list
$result = $resova->item(1)->reviews()->exec();
print_r($result);

// Single: Booking questions list
$result = $resova->item(1)->booking_questions()->exec();
print_r($result);

// Single: Extras list
$result = $resova->item(1)->extras()->exec();
print_r($result);

// All
$result = $resova->items->all()->exec();
print_r($result);
