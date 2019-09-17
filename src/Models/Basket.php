<?php

namespace Resova\Models;

use Resova\Model;

/**
 * The basket object
 * The baskets object allows you to manage shopping baskets that can be used to create Transactions.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Basket extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'                  => 'int',    // The unique id for the basket object.
            'customer'            => 'Customer', // The primary customer for the basket, an instance of the customer object.
            'price'               => 'float',  // The subtotal price for the basket.
            'fee'                 => 'float',  // The fee value of the basket.
            'discount'            => 'float',  // The total discount value of the basket.
            'tax'                 => 'float',  // The tax for the basket.
            'total'               => 'float',  // The total for the basket.
            'due;'                => 'float',  // The due amount for the basket.
            'deposit_due'         => 'float',  // The deposit due, if active, amount for the basket.
            'expired'             => 'bool',   // True if the basket has expired.
            'expires_at'          => 'string:timestamp', // The timestamp of when the basket expires.
            'storage_key'         => 'string', // Unique storage key
            'bookings'            => 'array[Booking]', // Array of basket bookings, contains: basket booking object.
            'promotions'          => 'array[Promotion]', // Array of promotions applied to the basket, contains: basket promotion object.
            'purchases'           => 'array[Purchase]', // Array of basket purchases, contains: basket purchase object.
            'combined_taxes_fees' => 'array', // Array of taxes and fees applied to the basket.
        ];
    }
}
