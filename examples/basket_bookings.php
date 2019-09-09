<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;
use \Resova\Models\Quantity;
use \Resova\Models\BookingRequest;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

// Booking create object has required fields
$bookingCreate = new BookingRequest([
    'instance_id' => 123,
    'quantities'  => [
        new Quantity(['pricing_category_id' => 123]),
        new Quantity(['pricing_category_id' => 345]),
    ]
]);

// Create
$result = $resova->basket(123)->bookings->create($bookingCreate)->exec();
print_r($result);

// Single
$result = $resova->basket(123)->booking(123)->exec();
print_r($result);

// Booking update object
$bookingUpdate = new BookingRequest([
    'instance_id' => 123,
    'quantities'  => [
        new Quantity(['pricing_category_id' => 234]),
    ]
]);

// Update
$result = $resova->basket(123)->booking(123)->update($bookingUpdate)->exec();
print_r($result);

// List
$result = $resova->basket(123)->bookings->exec();
print_r($result);
