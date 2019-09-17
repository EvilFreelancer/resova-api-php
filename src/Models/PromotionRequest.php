<?php

namespace Resova\Models;

use Resova\Model;

/**
 * Class PromotionRequest
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class PromotionRequest extends Model
{
    /**
     * List of allowed fields
     *
     * @return array
     */
    public function allowed(): array
    {
        return [
            'discount_code' => 'string', // The discount code for the promotion.
        ];
    }

    /**
     * List of required fields
     *
     * @return array
     */
    public function required(): array
    {
        return [
            'discount_code',
        ];
    }
}
