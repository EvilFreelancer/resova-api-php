<?php

namespace Resova\Objects;

/**
 * The basket purchase object
 * The purchase object allows you to manage purchases for a basket.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Purchase
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'             => 'int',    // The unique id for the purchase object.
            'price'          => 'float',  // The basket purchase subtotal.
            'discount'       => 'float',  // The total discount value of the basket purchase.
            'fee'            => 'float',  // The fee value of the basket purchase.
            'tax'            => 'float',  // The tax value of the basket purchase.
            'total'          => 'float',  // The total for the basket.
            'total_quantity' => 'int', // The total quantity of the purchase.
            'gift_voucher'   => 'GiftVoucher',  // The gift voucher object
            'gift_email'     => 'string',  // Gift email for the purchase
            'gift_message'   => 'string',  // Gift message for the purchase
        ];
    }

}
