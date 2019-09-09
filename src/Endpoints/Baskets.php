<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Endpoints\Baskets\Bookings;
use Resova\Endpoints\Baskets\Promotions;
use Resova\Endpoints\Baskets\Purchases;
use Resova\Models\BasketRequest;

/**
 * @property Bookings   $bookings    Bookings management
 * @property Purchases  $purchases   Purchases management
 * @property Promotions $promotions  Promotions management
 *
 * @method Bookings   booking(int $booking_id)
 * @method Purchases  purchase(int $purchase_id)
 * @method Promotions promotion(int $promotion_id)
 *
 * Class Baskets
 *
 * @package Resova\Endpoints
 */
class Baskets extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Retrieve a basket
     * Retrieves the details of a basket. Provide the unique id for the basket.
     *
     * @param int $basket_id The basket id
     *
     * @return $this
     */
    public function __invoke(int $basket_id)
    {
        $this->basket_id = $basket_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/baskets/' . $basket_id;

        return $this;
    }

    /**
     * Create a basket
     * Creates a new basket object.
     *
     * @param null|BasketRequest $basket
     *
     * @return $this
     */
    public function create(BasketRequest $basket = null): self
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = $this->config->get('base_uri') . '/baskets';
        $this->params   = $basket;

        return $this;
    }

    /**
     * Update a basket
     * Updates the specified basket by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged.
     * This request accepts mostly the same arguments as the basket creation call.
     *
     * @param null|BasketRequest $basket
     *
     * @return $this
     */
    public function update(BasketRequest $basket = null): self
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = $this->config->get('base_uri') . '/baskets/' . $this->basket_id;
        $this->params   = $basket;

        return $this;
    }

    /**
     * Delete a basket
     * Permanently deletes a basket. This cannot be undone.
     *
     * @return $this
     */
    public function delete(): self
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = $this->config->get('base_uri') . '/baskets/' . $this->basket_id;

        return $this;
    }

}
