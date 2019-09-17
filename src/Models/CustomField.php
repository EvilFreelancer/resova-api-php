<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class CustomField
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class CustomField extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'field_id'    => 'int', // The id of the customers field.
            'field_value' => 'string', // The value for this field.
        ];
    }
}
