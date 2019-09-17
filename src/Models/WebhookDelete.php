<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class WebhookDelete
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class WebhookDelete extends Model
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
