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
            'type'     => 'string',      // Can be: "card", "stored_card", "credit", "manual_card", "manual_cash", "manual_cheque", "manual_transfer", "arrival" or "invoice"
            'customer' => 'float',       // The amount of payment being made.
            'card'     => 'object:Card', // The card being used to make payment. Required if type is "card".
        ];
    }
}
