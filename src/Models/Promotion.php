<?php

namespace Resova\Objects;

/**
 * The basket promotion object
 * The promotions object allows you to manage promotions for a basket.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Promotion
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'       => 'int',    // The unique id for the object.
            'type'     => 'string', // Can be: 'discount' or 'custom'.
            'amount'   => 'float',  // The amount of the discount.
            'discount' => 'object', // The discount object if the promotion type is 'discount'.
        ];
    }

}
