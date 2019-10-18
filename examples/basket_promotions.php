<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Resova\Client;
use Resova\Models\PromotionRequest;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$resova = new Client(getenv('API_KEY'));

// Promotion create object has required fields
$promotionCreate = new PromotionRequest([
    'gift_voucher_id' => 123
]);

// Create
$result = $resova->basket(123)->promotions->create($promotionCreate)->exec();
print_r($result);

// Single
$result = $resova->basket(123)->promotion(123)->exec();
print_r($result);

// Delete
$result = $resova->basket(123)->promotion(123)->delete()->exec();
print_r($result);

// List
$result = $resova->basket(123)->promotions->all()->exec();
print_r($result);
