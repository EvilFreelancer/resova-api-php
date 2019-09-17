<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class PurchaseRequest
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class PurchaseRequest extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'gift_voucher_id' => 'int',    // Id for the gift voucher object.
            'gift_email'      => 'string', // Gift email for the purchase
            'gift_message'    => 'string', // Gift message for the purchase
            'total_quantity'  => 'int',    // The total quantity of the purchase.
            'fee_exempt'      => 'bool',   // True if this basket purchase is fee exempt.
            'tax_exempt'      => 'string', // True if this basket purchase is tax exempt.
        ];
    }

}
