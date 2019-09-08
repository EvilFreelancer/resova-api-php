<?php

namespace Resova\Endpoints;

use Resova\Client;

class Items extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Retrieve a item
     * Retrieves the details of a item. Provide the unique id for the item.
     *
     * @param int $item_id The item id
     *
     * @return $this
     */
    public function __invoke(int $item_id): self
    {
        $this->item_id = $item_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/items/' . $item_id;

        return $this;
    }

    /**
     * List all items
     * Returns a list of your items. The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return $this
     */
    public function all(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/items';

        return $this;
    }

    /**
     * List all item booking questions
     * Returns a list of your item booking questions.
     * The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return $this
     */
    public function booking_questions(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/items/' . $this->item_id . '/booking_questions';

        return $this;
    }

    /**
     * List all item reviews
     * Returns a list of your item reviews.
     * The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return $this
     */
    public function reviews(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/items/' . $this->item_id . '/reviews';

        return $this;
    }

    /**
     * List all item extras
     * Returns a list of your item extras.
     * The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return $this
     */
    public function extras(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = $this->config->get('base_uri') . '/items/' . $this->item_id . '/extras';

        return $this;
    }
}
