<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Interfaces\AvailabilityInterface;
use Resova\Interfaces\QueryInterface;
use Resova\Models\Instance;
use Resova\Models\InstancePricing;
use Resova\Models\Pricing;

/**
 * Availability represents the time slots (instances) and spaces
 * that are available or occupied on a given Item.
 *
 * @package Resova\Endpoints
 */
class Availability extends Client implements AvailabilityInterface
{
    /**
     * Retrieve daily availability
     * Retrieve the instances for items across a date range.
     *
     * @param string $start_date The start date for the availability range
     * @param string $end_date   The end date for the availability range.
     * @param array  $item_ids   Limit the availability results by item ids
     * @param int    $item_id    Limit the availability results to a single item
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function calendar(string $start_date, string $end_date, array $item_ids = [], int $item_id = null): QueryInterface
    {
        // Default parameters
        $params = [
            'start_date' => $start_date,
            'end_date'   => $end_date,
        ];

        // Optional: Limit the availability results by item ids
        if (!empty($item_ids)) {
            $params['item_ids'] = implode(',', $item_ids);
        }

        // Filter by ID
        if (!empty($item_id)) {
            $params['item_id'] = implode(',', $item_ids);
        }

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/availability/calendar' . '?' . http_build_query($params);
        $this->response = \Resova\Models\Availability::class;

        return $this;
    }

    /**
     * Retrieve an instance
     * Retrieve the details of a specific instance.
     *
     * @param string $instance_id The Instance Id
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function instance(string $instance_id): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/availability/instance/' . $instance_id;
        $this->response = Instance::class;

        return $this;
    }

    /**
     * Retrieve instance pricing
     * Retrieve the pricing for an instance for the quantities passed.
     *
     * @param string                 $instance_id
     * @param \Resova\Models\Pricing $pricing
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function instancePricing(string $instance_id, Pricing $pricing): QueryInterface
    {
        $pricing->setRequired([
            'quantities'
        ]);

        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/availability/instance/' . $instance_id . '/pricing';
        $this->params   = $pricing;
        $this->response = InstancePricing::class;

        return $this;
    }

}
