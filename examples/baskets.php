<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Resova\Client;
use Resova\Models\BasketRequest;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$config = new Config(['api_key' => getenv('API_KEY')]);
$resova = new Client($config);

// Basket request object
$basket = new BasketRequest([
    'customer_id' => 123,
    'expires_at'  => '1558101934',
]);

// Create
$result = $resova->baskets->create($basket)->exec();
print_r($result);

// Single
$result = $resova->basket(123)->exec();
print_r($result);

// Update
$result = $resova->basket(123)->update($basket)->exec();
print_r($result);

// Delete
$result = $resova->basket(123)->delete()->exec();
print_r($result);
