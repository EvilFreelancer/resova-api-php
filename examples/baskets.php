<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;
use \Resova\Requests\Basket;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

// Basket request object
$basket = new Basket([
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
