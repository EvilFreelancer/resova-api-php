<?php

namespace Resova\Models;

use Resova\Model;

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
