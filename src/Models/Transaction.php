<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class Transaction
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Transaction extends Model
{
    public function allowed(): array
    {
        return [
            'id'                  => 'int',      // The unique id for the transaction object.
            'reference'           => 'string',   // The unique reference for the transaction object.
            'customer'            => 'Customer', // The primary customer for the transaction, an instance of the customer object.
            'price'               => 'float',    // The subtotal price for the transaction.
            'fee'                 => 'float',    // The fee value of the transaction.
            'discount'            => 'float',    // The total discount value of the transaction.
            'tax'                 => 'float',    // The tax value of the transaction.
            'total'               => 'float',    // The total for the transaction.
            'paid'                => 'float',    // The paid value of the transaction.
            'refunded'            => 'float',    // The refunded value of the transaction.
            'due'                 => 'float',    // The due value of the transaction.
            'overpaid'            => 'boolean',  // True if transaction is overpaid.
            'status'              => 'boolean',  // True if transaction is active.
            'combined_taxes_fees' => 'array',    // Array of taxes and fees applied to the transaction.
            'bookings'            => 'array[Booking]', // Array of bookings applied to the transaction, contains: booking object.
            'payments'            => 'array[Booking]', // Array of payments applied to the transaction, contains: payment object.
            'promotions'          => 'array[Booking]', // Array of promotions applied to the transaction, contains: promotion object.
        ];
    }
}
