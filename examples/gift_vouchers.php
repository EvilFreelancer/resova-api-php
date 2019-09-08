<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;
use \Resova\Requests\Customer;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

// Single
$result = $resova->gift_voucher(123)->exec();
print_r($result);

// All
$result = $resova->gift_vouchers->exec();
print_r($result);
