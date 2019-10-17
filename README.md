[![Latest Stable Version](https://poser.pugx.org/evilfreelancer/resova-api-php/v/stable)](https://packagist.org/packages/evilfreelancer/resova-api-php)
[![Build Status](https://travis-ci.org/EvilFreelancer/resova-api-php.svg?branch=master)](https://travis-ci.org/EvilFreelancer/resova-api-php)
[![Total Downloads](https://poser.pugx.org/evilfreelancer/resova-api-php/downloads)](https://packagist.org/packages/evilfreelancer/resova-api-php)
[![License](https://poser.pugx.org/evilfreelancer/resova-api-php/license)](https://packagist.org/packages/evilfreelancer/resova-api-php)
[![Code Climate](https://codeclimate.com/github/EvilFreelancer/resova-api-php/badges/gpa.svg)](https://codeclimate.com/github/EvilFreelancer/resova-api-php)
[![Code Coverage](https://scrutinizer-ci.com/g/EvilFreelancer/resova-api-php/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/EvilFreelancer/resova-api-php/?branch=master)
[![Scrutinizer CQ](https://scrutinizer-ci.com/g/evilfreelancer/resova-api-php/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/evilfreelancer/resova-api-php/)

# Resova API PHP7 client

    composer require evilfreelancer/resova-api-php

My [review of Resova API](https://docs.google.com/document/d/11RVyOVyMxKqBIg-yNkJfhXS2dO0HwpocJt4QhjwXOU0/edit?usp=sharing) (work in progress)

## Read first, this is important!

1. Resova's technical support is very reluctant to answer any of your
requests, even if you have a bank card connected and you earn money,
with a small degree of probability any requests from you will stop
being processed, and your mail will be blacklisted

2. On trial account you can't use API, so you can't check functionality
before adding the bank card

3. You should add your server's IP to whitelist in Resova developer settings

4. But despite paragraph `3.` your server's IP may be blocked
automatically without explanations (via probably fail2ban),
and support team after few unanswered questions will add your
email/facebook account to blacklist

5. Optimal amount of HTTP requests before your IP will banned
is no more than 1000 per day, or about 40 requests per hour, 
maybe this is due to the recent DDoS ​​attack to their servers,
so be very careful, otherwise you will have to configure
intermediate proxy servers, which is not very convenient
(and which also will be banned after some time)

6. Resova does not provide test accounts or stagging environments
to test the functionality of your application before publishing to
production, so be very careful when working with Resova API,
double-check all data

In general: working with Resova is a big risk, because if you will have any technical issues
then you probably will not receive any help and be banned by support team.

If you are a representative of Resova and would like to contact the
author of this project, please [create an issue](https://github.com/EvilFreelancer/resova-api-php/issues).

## Terminology

There are four key objects in Resova that every API developer should know about.

| Objects      | Description |
|--------------|-------------|
| items        | An activity/service is known as an Item, these are what your customers will purchase. |
| instances    | An instance is a date and time belonging to an item. An instance is required to be included when creating a booking. |
| bookings     | A customer will make a booking for a specific Item and Instance (date/time), they're essentially purchasing something. All bookings belong to a Transaction |
| transactions | A Transaction is the overall purchase order. All Bookings belong to a Transaction and there can be more than one Booking per Transaction. |

## How to use

See other examples of usage [here](examples) separated by class names.

### Basic example

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

$resova = new \Resova\Client(['api_key' => 'xxxx']);

// Get all slots for all items in dates range
$calendar = $resova->availability->calendar(date('Y-m-d'), date('Y-m-d'))->exec();

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

Availability details of instances, instances prices and calendars of dates etc.

> Instance - in logic of Resova API mean time slot with price

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
