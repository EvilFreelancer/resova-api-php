<?php

namespace Resova\Objects;

/**
 * The basket booking object
 * The booking object allows you to manage bookings for a basket.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Booking
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'             => 'int',    // The unique id for the booking object.
            'item'           => 'object', // The item associated with the booking, an instance of the item object.
            'time'           => 'object', // The time associated with the booking, an instance of the time object
            'booking_date'   => 'string', // The date of the basket booking.
            'booking_time'   => 'string', // The time of the basket booking.
            'booking_end'    => 'string', // The end time of the basket booking.
            'duration'       => 'int',    // The duration of the basket booking.
            'total_quantity' => 'int',    // The total quantity of spaces for the basket booking.
            'quantities'     => 'array[Quantity]', // The quantities of item pricing categories for this basket booking.
            'extras'         => 'array[Extra]', // The item extras for this basket booking.
            'price'          => 'float',  // The basket booking subtotal.
            'discount'       => 'float',  // The total discount value of the basket.
            'fee'            => 'float',  // The fee value of the basket.
            'tax'            => 'float',  // The tax value of the basket.
            'total'          => 'float',  // The total for the basket.
            'questions'      => 'array[Question]', // The item booking questions for this basket booking.
            'participants'   => 'array',  // The participants for this basket booking.
        ];
    }
}
