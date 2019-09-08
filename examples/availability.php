<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

$result = (string) $resova->availability->instance(3)->exec();
print_r($result);

$result = $resova->availability->instance(123)->pricing()->exec();
print_r($result);

$result = $resova->availability->calendar(date('Y-m-d'), date('Y-m-d'))->exec();
print_r($result);
