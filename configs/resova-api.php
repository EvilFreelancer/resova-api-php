<?php

return [
    'api_key'         => '',
    'proxy'           => null,
    'base_uri'        => 'https://api.resova.eu/v1',
    'user_agent'      => 'Laravel wrapper of Resova PHP Client',
    'timeout'         => 20,
    'tries'           => 2,  // Count of tries
    'seconds'         => 10, // Waiting time per each try
    'debug'           => false,
    'track_redirects' => false,
];
