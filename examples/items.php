<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

// Single
$result = $resova->item(1)->exec();
print_r($result);

// Single: Reviews list
$result = $resova->item(1)->reviews()->exec();
print_r($result);

// Single: Booking questions list
$result = $resova->item(1)->booking_questions()->exec();
print_r($result);

// Single: Extras list
$result = $resova->item(1)->extras()->exec();
print_r($result);

// All
$result = $resova->items->exec();
print_r($result);
