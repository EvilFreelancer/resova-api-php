<?php

namespace Resova\Models;

use Resova\Model;

/**
 * The item questions.
 *
 * @codeCoverageIgnore
 * @package Resova\Models
 */
class Question extends Model
{
    public function allowed(): array
    {
        return [
            'question_id'    => 'int', // The unique id for the item booking question object.
            'question_value' => 'string', // The value of the question.
        ];
    }
}
