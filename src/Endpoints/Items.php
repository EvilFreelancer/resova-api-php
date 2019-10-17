<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Interfaces\QueryInterface;

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
        $this->endpoint = '/items/' . $item_id;

        return $this;
    }

    /**
     * List all items
     * Returns a list of your items. The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return $this
     */
    public function all(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/items';

        return $this;
    }

    /**
     * List all item booking questions
     * Returns a list of your item booking questions.
     * The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function booking_questions(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/items/' . $this->item_id . '/booking_questions';

        return $this;
    }

    /**
     * List all item reviews
     * Returns a list of your item reviews.
     * The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function reviews(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/items/' . $this->item_id . '/reviews';

        return $this;
    }

    /**
     * List all item extras
     * Returns a list of your item extras.
     * The items are returned sorted by creation date, with the most recent item appearing first.
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function extras(): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/items/' . $this->item_id . '/extras';

        return $this;
    }
}
