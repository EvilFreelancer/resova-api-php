<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class TransactionRequest
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class TransactionRequest extends Model
{
    public function allowed(): array
    {
        return [
            'basket_id' => 'string',
            'payment'   => 'float',      // The payment for the basket
        ];
    }
}
