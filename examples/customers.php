<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;
use \Resova\Requests\Customer;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

// Customer create request object
$customerCreate = new Customer([
    'first_name' => 'John',
    'last_name'  => 'Doe',
    'email'      => 'email@example.com'
]);

// Create
$result = $resova->customers->create($customerCreate)->exec();
print_r($result);

// Single
$result = $resova->customer(123)->exec();
print_r($result);

// Customer update request object
$customerUpdate = new Customer([
    'first_name' => 'John',
    'last_name'  => 'Doe',
    'email'      => 'email@example.com'
]);

// Update
$result = $resova->customer(123)->update($customerUpdate)->exec();
print_r($result);
