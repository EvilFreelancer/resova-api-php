<?php

namespace Resova\Requests;

use Resova\Model;

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
            'quantities' => 'array',    // The quantities of item pricing categories. Pass an array of objects.
        ];
    }
}
