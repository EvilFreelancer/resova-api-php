<?php

namespace Resova\Interfaces;

use Resova\Models\Pricing;

interface AvailabilityInterface
{
    /**
     * Retrieve daily availability
     * Retrieve the instances for items across a date range.
     *
     * @param string $start_date The start date for the availability range
     * @param string $end_date   The end date for the availability range.
     * @param array  $item_ids   Limit the availability results by item ids
     * @param int    $id         Limit the availability results to a single item
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function calendar(string $start_date, string $end_date, array $item_ids = [], int $id = null): QueryInterface;

    /**
     * Retrieve an instance
     * Retrieve the details of a specific instance.
     *
     * @param string $instance_id The Instance Id
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function instance(string $instance_id): QueryInterface;

    /**
     * Retrieve instance pricing
     * Retrieve the pricing for an instance for the quantities passed.
     *
     * @param string                 $instance_id
     * @param \Resova\Models\Pricing $pricing
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function instancePricing(string $instance_id, Pricing $pricing): QueryInterface;
}