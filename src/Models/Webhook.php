<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Webhook events notify you whenever an event occurs on your account.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Webhook extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'id'       => 'int',     // The unique id for the object.
            'endpoint' => 'string',  // The endpoint url this webhook event is sent to.
            'events'   => 'array',   // The events this webhook is fired on. Can include: 'transaction.created', 'transaction.cancelled', 'booking.update' or 'booking.cancelled'.
            'status'   => 'boolean', // True if webhook is active.
        ];
    }
}
