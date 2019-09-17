<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class Error
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Error extends Model
{

    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'type'              => 'string', // type of error returned. Can be: 'api_error', 'authentication_error', 'not_found_error', 'validation_error' or 'rate_limit_error'.
            'message'           => 'string', // A message providing more details about the error.
            'validation_failed' => 'string', // For validation errors this will provide details on what validation failed.
        ];
    }
}
