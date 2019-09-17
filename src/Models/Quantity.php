<?php

namespace Resova\Models;

use Resova\Model;

/**
 * The quantity of item pricing category.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Quantity extends Model
{
    public function allowed(): array
    {
        return [
            'pricing_category_id' => 'int', // The unique id for the item pricing category object.
            'quantity'            => 'int', // The total quantity
        ];
    }
}
