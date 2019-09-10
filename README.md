[![Latest Stable Version](https://poser.pugx.org/evilfreelancer/resova-api-php/v/stable)](https://packagist.org/packages/evilfreelancer/resova-api-php)
[![Build Status](https://travis-ci.org/EvilFreelancer/resova-api-php.svg?branch=master)](https://travis-ci.org/EvilFreelancer/resova-api-php)
[![Total Downloads](https://poser.pugx.org/evilfreelancer/resova-api-php/downloads)](https://packagist.org/packages/evilfreelancer/resova-api-php)
[![License](https://poser.pugx.org/evilfreelancer/resova-api-php/license)](https://packagist.org/packages/evilfreelancer/resova-api-php)
[![Code Climate](https://codeclimate.com/github/EvilFreelancer/resova-api-php/badges/gpa.svg)](https://codeclimate.com/github/EvilFreelancer/resova-api-php)
[![Code Coverage](https://scrutinizer-ci.com/g/EvilFreelancer/resova-api-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/EvilFreelancer/resova-api-php/?branch=master)
[![Scrutinizer CQ](https://scrutinizer-ci.com/g/evilfreelancer/resova-api-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/evilfreelancer/resova-api-php/)

# Resova API PHP7 client

    composer require evilfreelancer/resova-api-php

## How to use

See other examples of usage [here](examples) separated by class names.

### Basic example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$resova = new \Resova\Client(['api_key' => 'xxxx']);

// Get all slots for all items in dates range
$calendar = $resova->availability->calendar(date('Y-m-d'), date('Y-m-d'), [4, 5])->exec();

// Get availability of slots for some item
$instance = $resova->availability->instance(3)->exec();
```

**Where can I find my api key?**

If you haven't already, you can sign up for a new account here.
Once you have logged into your account head over to **Settings > General Settings > Developer**
where your API KEY will be located.

### *Items* endpoints

Items mean your rooms in Resova system.

https://developers.resova.com/reference#items

```php
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
```

### *Availability* endpoints

Availability details of rooms, prices, information about room, calendars etc.

https://developers.resova.com/reference#availability

```php
use \Resova\Models\Pricing;

$result = $resova->availability->instance(123)->exec();
print_r($result);

$pricing = new Pricing([
    'quantities' => [
        ['pricing_category_id' => 1, 'quantity' => 2],
        ['pricing_category_id' => 1, 'quantity' => 3],
        ['pricing_category_id' => 1, 'quantity' => 4],
    ]
]);
$result = $resova->availability->instance(123)->pricing($pricing)->exec();
print_r($result);

$result = $resova->availability->calendar(date('Y-m-d'), date('Y-m-d'))->exec();
print_r($result);
```

### *Baskets* endpoints

Baskets in Resova it mean Carts, it contain details about prepared for booking carts created by clients.

https://developers.resova.com/reference#the-basket-object

```php
use \Resova\Models\BasketRequest;

// Basket request object
$basket = new BasketRequest([
    'customer_id' => 123,
    'expires_at'  => '1558101934',
]);

// Create
$result = $resova->baskets->create($basket)->exec();
print_r($result);

// List
$result = $resova->baskets->exec();
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
```

### *Customers* endpoints

For work with customers information, like emails, phones, addresses, etc.

https://developers.resova.com/reference#customers

```php
use \Resova\Models\Customer;

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
```

### *Gift Vouchers* endpoints

Gift Vouchers in Resova it mean Promocodes, you can manage your promo campaigns. 

https://developers.resova.com/reference#gift-vouchers

```php
// Single
$result = $resova->gift_voucher(123)->exec();
print_r($result);

// All
$result = $resova->gift_vouchers->exec();
print_r($result);
```

# Links

* https://resova.com
* https://developers.resova.com/reference
