<?php

namespace Resova;

class Config
{
    /**
     * List of allowed parameters
     */
    public const ALLOWED = [
        'user_agent',
        'base_uri',
        'api_key',
        'timeout',
        'tries',
        'seconds',
        'debug',
        'track_redirects'
    ];

    /**
     * List of minimal required parameters
     */
    public const REQUIRED = [
        'user_agent',
        'base_uri',
        'timeout',
        'api_key',
    ];

    /**
     * List of configured parameters
     *
     * @var array
     */
    private $_parameters;

    /**
     * Config constructor.
     *
     * @param array $parameters List of parameters which can be set on object creation stage
     * @throws \ErrorException
     */
    public function __construct(array $parameters = [])
    {
        // Set default parameters of client
        $this->_parameters = [
            // Errors must be disabled by default, because we need to get error codes
            // @link http://docs.guzzlephp.org/en/stable/request-options.html#http-errors
            'http_errors'     => false,

            // Wrapper settings
            'tries'           => 2,  // Count of tries
            'seconds'         => 10, // Waiting time per each try

            // Optional parameters
            'debug'           => false,
            'track_redirects' => false,

            // Main parameters
            'timeout'         => 20,
            'user_agent'      => 'Resova PHP Client',
            'base_uri'        => 'https://api.resova.eu/v1'
        ];

        // Overwrite parameters by client input
        foreach ($parameters as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * Set parameter by name
     *
     * @param string               $name  Name of parameter
     * @param string|bool|int|null $value Value of parameter
     * @return \Resova\Config
     * @throws \ErrorException
     */
    private function set($name, $value): self
    {
        if (!\in_array($name, self::ALLOWED, false)) {
            throw new \ErrorException("Parameter \"$name\" is not in available list [" . implode(',', self::ALLOWED) . ']');
        }

        // Add parameters into array
        $this->_parameters[$name] = $value;
        return $this;
    }

    /**
     * Get available parameter by name
     *
     * @param string $name
     * @return string|bool|int|null
     */
    public function get(string $name)
    {
        return $this->_parameters[$name] ?? null;
    }

    /**
     * Get all available parameters
     *
     * @return array
     */
    public function all(): array
    {
        return $this->_parameters;
    }

    /**
     * Return all ready for Guzzle parameters
     *
     * @return array
     */
    public function guzzle(): array
    {
        return [
            // 'base_uri'        => $this->get('base_uri'), // By some reasons base_uri option is not work anymore
            'timeout'         => $this->get('timeout'),
            'track_redirects' => $this->get('track_redirects'),
            'debug'           => $this->get('debug'),
            'headers'         => [
                'User-Agent' => $this->get('user_agent'),
                'X-API-KEY'  => $this->get('api_key'),
            ]
        ];
    }
}
