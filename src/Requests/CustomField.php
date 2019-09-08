<?php

namespace Resova\Requests;

use Resova\Model;

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
