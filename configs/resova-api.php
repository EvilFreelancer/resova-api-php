<?php

return [
    'api_key'         => '',
    'proxy'           => null,
    'base_uri'        => 'https://api.resova.eu/v1',
    'user_agent'      => 'Resova PHP Client',
    'timeout'         => 20,
    'tries'           => 2,  // Count of tries
    'seconds'         => 10, // Waiting time per each try
    'verbose'         => false,
    'debug'           => false,
    'track_redirects' => false,
    'allow_redirects' => false,

    /*
     * Describes the SSL certificate verification behavior of a request.
     * http://docs.guzzlephp.org/en/stable/request-options.html#verify
     */
    'verify' => false,
];
