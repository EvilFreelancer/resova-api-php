<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class Pricing
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Pricing extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            // Strange BUG here on Resova side, possible to send only 1 (one) quantity item per request
            // TODO: Report about this ^^^ to Resova support
            'quantities' => 'array[Quantity]', // The quantities of item pricing categories. Pass an array of objects.
        ];
    }
}
