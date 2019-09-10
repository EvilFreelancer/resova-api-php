<?php

namespace Resova\Endpoints\Baskets;

use Resova\Client;
use Resova\Models\PromotionRequest;

class Promotions extends Client
{
    /**
     * Create a basket promotion
     * Creates a new basket promotion object.
     *
     * @param PromotionRequest $promotion
     *
     * @return $this
     */
    public function create(PromotionRequest $promotion): self
    {
        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/baskets/' . $this->basket_id . '/promotions';
        $this->params   = $promotion;

        return $this;
    }

    /**
     * Retrieve a basket promotion
     * Retrieves the details of a basket promotion. Provide the unique id for the basket promotion.
     *
     * @param int $promotion_id The basket promotion id
     *
     * @return $this
     */
    public function __invoke(int $promotion_id): self
    {
        $this->promotion_id = $promotion_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/baskets/' . $this->basket_id . '/promotions/' . $promotion_id;

        return $this;
    }

    /**
     * Delete a basket promotion
     * Permanently deletes a basket promotion. It cannot be undone.
     *
     * @return $this
     */
    public function delete(): self
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/baskets/' . $this->basket_id . '/promotions/' . $this->promotion_id;

        return $this;
    }

    /**
     * List all basket promotions
     * Returns a list of your basket promotions.
     * The basket promotions are returned sorted by creation date, with the most recent basket purchase appearing first.
     *
     * @return $this
     */
    public function all(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/baskets/' . $this->basket_id . '/promotions';

        return $this;
    }
}
