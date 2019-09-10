<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;
use \Resova\Models\Pricing;
use \Resova\Models\Quantity;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

$result = (string) $resova->availability->instance(3)->exec();
print_r($result);

$pricing = new Pricing([
    'quantities' => [
        new Quantity(['pricing_category_id' => 1, 'quantity' => 2]),
        new Quantity(['pricing_category_id' => 1, 'quantity' => 3]),
        new Quantity(['pricing_category_id' => 1, 'quantity' => 4]),
    ]
]);
$result = $resova->availability->instance(123)->pricing($pricing)->exec();
print_r($result);

$result = $resova->availability->calendar(date('Y-m-d'), date('Y-m-d'))->exec();
print_r($result);
