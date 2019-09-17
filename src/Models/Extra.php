<?php

namespace Resova\Models;

use Resova\Model;

/**
 * The item extras.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Extra extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'extra_id' => 'int', // The unique id for the item extra object.
            'quantity' => 'int', // The quantity of the extra.
        ];
    }
}
