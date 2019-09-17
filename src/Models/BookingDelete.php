<?php

namespace Resova\Models;

class BookingDelete
{
    /**
     * List of allowed fields
     *
     * @codeCoverageIgnore
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'      => 'int',
            'deleted' => 'bool',
        ];
    }
}
