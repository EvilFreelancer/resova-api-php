<?php

namespace Resova\Requests;

use Resova\Model;

class Basket extends Model
{
    public function allowed(): array
    {
        return [
            'customer_id' => 'int', // The id of the primary customer for the basket
            'expires_at'  => 'string', // The timestamp of when the basket expires. Manually override the expiration date for the basket
        ];
    }
}
