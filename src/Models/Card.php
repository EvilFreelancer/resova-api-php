<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class Card
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Card extends Model
{
    public function allowed(): array
    {
        return [
            'token'       => 'string', // A payment token is required for certain gateways.
            'card_holder' => 'string', // The card holder name for the card. Required if no token.
            'card_number' => 'string', // The card number for the card. Required if no token.
            'expiry'      => 'string', // The expiry for the card, format MM/YY. Required if no token.
            'cvv2'        => 'string', // The cvv2 for the card. Required if no token.
        ];
    }
}
