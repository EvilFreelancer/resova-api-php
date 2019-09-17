<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class TransactionUpdate
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class TransactionUpdate extends Model
{
    public function allowed(): array
    {
        return [
            'customer_id' => 'int',  // The primary customer for the transaction.
            'status'      => 'bool', // True if the transaction is active.
        ];
    }
}
