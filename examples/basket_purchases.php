<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Resova\Client;
use Resova\Models\PurchaseRequest;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$config = new Config(['api_key' => getenv('API_KEY')]);
$resova = new Client($config);

// Purchase create object has required fields
$purchaseCreate = new PurchaseRequest([
    'gift_voucher_id' => 123
]);

// Create
$result = $resova->basket(123)->purchases->create($purchaseCreate)->exec();
print_r($result);

// Single
$result = $resova->basket(123)->purchase(123)->exec();
print_r($result);

// Purchase update object
$purchaseUpdate = new PurchaseRequest([
    'gift_voucher_id' => 234
]);

// Update
$result = $resova->basket(123)->purchase(123)->update($purchaseUpdate)->exec();
print_r($result);

// List
$result = $resova->basket(123)->purchases->all()->exec();
print_r($result);
