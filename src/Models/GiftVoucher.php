<?php

namespace Resova\Models;

use Resova\Model;

/**
 * The gift voucher object
 * Gift vouchers are types of gifts that can be purchased by customers,
 * ie "Gift voucher for £10.00", which when purchased will generated
 * a redeemable gift code.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class GiftVoucher extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'           => 'int',    // The unique id for the object.
            'name'         => 'string', // The name of the gift voucher.
            'amount'       => 'float',  // The purchase amount for this gift voucher.
            'voucher_type' => 'string', // Can be: value or spaces.
            'discount'     => 'float',  // The discountable amount for a gift code belonging to this voucher.
            'description'  => 'string', // The description of how the gift voucher is applied.
            'status'       => 'bool',   // True if the gift voucher is active.
        ];
    }
}
