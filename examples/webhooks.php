<?php
require_once __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;
use Resova\Client;

if (file_exists(__DIR__ . '/.env')) {
    Dotenv::create(__DIR__)->load();
}

$resova = new Client(getenv('API_KEY'));

// All
$result = $resova->webhooks->all()->exec();
print_r($result);
