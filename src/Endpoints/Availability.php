<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Endpoints\Availability\Calendars;
use Resova\Endpoints\Availability\Instances;

/**
 * @method Instances instance(int $instance_id)
 * @method Calendars calendar(string $start_date, string $end_date, array $item_ids = [])
 *
 * Availability represents the time slots (instances) and spaces
 * that are available or occupied on a given Item.
 *
 * @package Resova\Endpoints
 */
class Availability extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;
}
