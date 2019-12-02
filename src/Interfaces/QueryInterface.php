<?php

namespace Resova\Interfaces;

use Psr\Http\Message\ResponseInterface;

interface QueryInterface
{
    /**
     * Execute request and return response
     *
     * @param bool $debug
     *
     * @return null|object Array with data or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     * @throws \Resova\Exceptions\EmptyResults
     */
    public function exec(bool $debug = false);

    /**
     * Execute query and return RAW response from remote API
     *
     * @param bool $debug
     *
     * @return null|\Psr\Http\Message\ResponseInterface RAW response or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     * @throws \Resova\Exceptions\EmptyResults
     */
    public function raw(bool $debug = false): ?ResponseInterface;
}
