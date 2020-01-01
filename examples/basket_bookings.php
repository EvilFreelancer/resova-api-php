<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Resova\Client;
use Resova\Models\Quantity;
use Resova\Models\BookingRequest;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$config = new Config(['api_key' => getenv('API_KEY')]);
$resova = new Client($config);

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
$result = $resova->basket(123)->bookings->all()->exec();
print_r($result);
