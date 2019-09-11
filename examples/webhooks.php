<?php

require_once __DIR__ . '/../vendor/autoload.php';

use \Resova\Client;

$resova = new Client(['api_key' => '85PGcaVHn6ICbe193RL7LdHDlXMn6D09WSCP3HlUfEdCGf08Jq5yCtfosMD1NL']);

// All
$result = $resova->webhooks->all()->exec();
print_r($result);
