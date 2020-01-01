<?php

namespace Resova\Laravel;

use Illuminate\Support\Facades\Facade;

class ClientFacade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return ClientWrapper::class;
    }
}
