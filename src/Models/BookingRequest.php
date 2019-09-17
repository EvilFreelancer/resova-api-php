<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class BookingRequest
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class BookingRequest extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'instance_id'  => 'int', // The instance id for the date, item and time.
            // TODO: implement validation like "array of objects"
            'quantities'   => 'array[Quantity]', // The quantities of item pricing categories for this basket booking. Pass an array of objects.
            'booking_time' => 'string', // The custom start time of the booking, can result in the creation of a time adjustment or an error if that time is unvavailable .
            'booking_end'  => 'string', // The custom end time of the booking, can result in the creation of a time adjustment or an error if that time is unvavailable.
            'fee_exempt'   => 'string', // True if this basket booking is fee exempt.
            'tax_exempt'   => 'string', // True if this basket booking is tax exempt.
            // TODO: implement validation like "array of objects"
            'extras'       => 'array[Extra]', // The item extras for this basket booking. Pass an array of objects.
            // TODO: implement validation like "array of objects"
            'questions'    => 'array[Question]', // The item booking questions for this basket booking. Pass an array of objects.
        ];
    }
}
