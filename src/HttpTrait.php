<?php

namespace Resova;

use ErrorException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;
use Resova\Exceptions\EmptyResults;

/**
 * @author  Paul Rock <paul@drteam.rocks>
 * @link    https://drteam.rocks
 * @license MIT
 * @package Resova
 */
trait HttpTrait
{
    /**
     * Initial state of some variables
     *
     * @var null|\GuzzleHttp\Client
     */
    public $client;

    /**
     * Object of main config
     *
     * @var \Resova\Config
     */
    public $config;

    /**
     * Request executor with timeout and repeat tries
     *
     * @param string $type   Request method
     * @param string $url    endpoint url
     * @param mixed  $params List of parameters
     * @param bool   $debug  If we need a debug mode
     *
     * @return \Psr\Http\Message\ResponseInterface|null
     * @throws \ErrorException
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function repeatRequest(string $type, string $url, $params, bool $debug = false): ?ResponseInterface
    {
        $type = strtoupper($type);

        for ($i = 1; $i < $this->config->get('tries'); $i++) {

            if ($params === null) {
                // Execute the request to server
                $result = $this->client->request($type, $this->config->get('base_uri') . $url);
            } else {
                // Execute the request to server
                $result = $this->client->request($type, $this->config->get('base_uri') . $url, [RequestOptions::FORM_PARAMS => $params->toArray()]);
            }

            // Return request for debug mode
            if ($debug) {
                return $result;
            }

            // Check the code status
            $code   = $result->getStatusCode();
            $reason = $result->getReasonPhrase();

            // If success response from server
            if ($code === 200 || $code === 201) {
                return $result;
            }

            // If not "too many requests", then probably some bug on remote or our side
            if ($code !== 429) {
                throw new ErrorException($code . ' ' . $reason);
            }

            // Waiting in seconds
            sleep($this->config->get('seconds'));
        }

        // Return false if loop is done but no answer from server
        return null;
    }

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
    public function exec(bool $debug = false)
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params, false, $debug);
    }

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
    public function raw(bool $debug = false): ?ResponseInterface
    {
        return $this->doRequest($this->type, $this->endpoint, $this->params, true, $debug);
    }

    /**
     * Make the request and analyze the result
     *
     * @param string $type     Request method
     * @param string $endpoint Api request endpoint
     * @param mixed  $params   List of parameters
     * @param bool   $raw      Return data in raw format
     * @param bool   $debug
     *
     * @return null|object|ResponseInterface Array with data, RAW response or NULL if error
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \ErrorException
     * @throws \Resova\Exceptions\EmptyResults
     */
    private function doRequest($type, $endpoint, $params = null, bool $raw = false, bool $debug = false)
    {
        // Null by default
        $response = null;

        // Execute the request to server
        $result = $this->repeatRequest($type, $endpoint, $params, $debug);

        // If debug then return Guzzle object
        if ($debug) {
            return $result;
        }

        if (null === $result) {
            throw new EmptyResults('Empty results returned from Resova API');
        }

        // Return RAW result if required
        return $raw ? $result : json_decode($result->getBody(), false);
    }

}
