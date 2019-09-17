<?php


namespace Resova\Models;


class BasketDelete
{
    /**
     * List of allowed fields
     *
     * @codeCoverageIgnore
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
