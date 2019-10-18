<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Resova\Client;
use Resova\Models\Pricing;
use Resova\Models\Quantity;
use Dotenv\Dotenv;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$resova = new Client(getenv('API_KEY'));
$result = $resova->availability->instance(3)->exec();
print_r($result);

$pricing = new Pricing([
    'quantities' => [
        new Quantity(['pricing_category_id' => 1, 'quantity' => 2]),
        new Quantity(['pricing_category_id' => 1, 'quantity' => 3]),
        new Quantity(['pricing_category_id' => 1, 'quantity' => 4]),
    ]
]);
$result  = $resova->availability->instancePricing(123, $pricing)->exec();
print_r($result);

$result = $resova->availability->calendar(date('Y-m-d'), date('Y-m-d'))->exec();
print_r($result);
