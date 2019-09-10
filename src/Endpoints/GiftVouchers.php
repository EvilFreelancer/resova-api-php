<?php

namespace Resova\Endpoints;

use Resova\Client;

class GiftVouchers extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Retrieve a gift voucher
     * Retrieves the details of a gift voucher. Provide the unique id for the gift voucher.
     *
     * @param int $voucher_id The gift voucher id
     *
     * @return $this
     */
    public function __invoke(int $voucher_id): self
    {
        $this->voucher_id = $voucher_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/gift_vouchers/' . $voucher_id;

        return $this;
    }

    /**
     * List all gift vouchers
     * Returns a list of your gift vouchers.
     * The gift vouchers are returned sorted by creation date, with the most recent gift vouchers appearing first.
     *
     * @return $this
     */
    public function all(): self
    {
        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/gift_vouchers';

        return $this;
    }
}
