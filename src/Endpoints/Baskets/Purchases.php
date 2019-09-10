<?php

namespace Resova\Endpoints\Baskets;

use Resova\Client;
use Resova\Models\PurchaseRequest;

class Purchases extends Client
{
    /**
     * Create a basket purchase
     * Creates a new basket purchase object
     *
     * @param PurchaseRequest $purchase
     *
     * @return $this
     */
    public function create(PurchaseRequest $purchase): self
    {
        $purchase->setRequired([
            'gift_voucher_id',
        ]);

        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/baskets/' . $this->basket_id . '/purchases';
        $this->params   = $purchase;

        return $this;
    }

    /**
     * Retrieve a basket purchase
     * Retrieves the details of a basket purchase. Provide the unique id for the basket purchase.
     *
     * @param int $purchase_id The basket purchase id
     *
     * @return $this
     */
    public function __invoke(int $purchase_id): self
    {
        $this->purchase_id = $purchase_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/baskets/' . $this->basket_id . '/purchases/' . $purchase_id;

        return $this;
    }

    /**
     * Delete a basket purchase
     * Permanently deletes a basket purchase. It cannot be undone.
     *
     * @return $this
     */
    public function delete(): self
    {
        // Set HTTP params
        $this->type     = 'delete';
        $this->endpoint = '/baskets/' . $this->basket_id . '/purchases/' . $this->purchase_id;

        return $this;
    }

    /**
     * Update a basket purchase
     * Updates the specified basket purchase by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged.
     * This request accepts mostly the same arguments as the basket purchase creation call.
     *
     * @param PurchaseRequest $purchase
     *
     * @return $this
     */
    public function update(PurchaseRequest $purchase): self
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/baskets/' . $this->basket_id . '/purchases/' . $this->purchase_id;
        $this->params   = $purchase;

        return $this;
    }

    /**
     * List all basket purchases
     * Returns a list of your basket purchases.
     * The basket purchases are returned sorted by creation date, with the most recent basket purchase appearing first.
     *
     * @return $this
     */
    public function all(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/baskets/' . $this->basket_id . '/purchases';

        return $this;
    }
}
