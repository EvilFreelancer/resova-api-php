<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;
use \Resova\Models\PurchaseRequest;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

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
