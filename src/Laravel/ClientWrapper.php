<?php

namespace Resova\Laravel;

use Resova\Client;
use Resova\Config;

class ClientWrapper
{
    /**
     * Return Resova API client object
     *
     * @param array $params
     *
     * @return \Resova\Client
     * @throws \ErrorException
     */
    public function getClient(array $params = []): Client
    {
        $parameters = config('resova-api');
        $parameters = array_merge($parameters, $params);
        $config     = new Config($parameters);

        return new Client($config);
    }
}