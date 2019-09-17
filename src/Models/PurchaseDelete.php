<?php

namespace Resova\Models;

/**
 * Class PurchaseDelete
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class PurchaseDelete
{
    /**
     * List of allowed fields
     *
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
