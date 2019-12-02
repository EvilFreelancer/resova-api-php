<?php

namespace Resova\Tests\Endpoints;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client as GuzzleHttpClient;
use Resova\Client as ResovaClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Exception\RequestException;
use Resova\Config as ResovaConfig;

class AvailabilityTest extends TestCase
{
    private $json = [];

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->json = [
            'availability_calendar' => file_get_contents(__DIR__ . '/availability_calendar.json'),
        ];
    }

    public function testCalendar()
    {
        // Create a mock and queue two responses.
        $mock = new MockHandler([
            new Response(200, [], $this->json['availability_calendar']),
            new RequestException("Error Communicating with Server", new Request('GET', 'test'))
        ]);

        $handler = HandlerStack::create($mock);

        // Config
        $config = new ResovaConfig();
        $config->set('handler', $handler);
        $config->set('api_key', '123456');

        // Resova client
        $resova = new ResovaClient($config);

        $result = $resova->availability->calendar('1', '2', [1], 1)->raw(true);
        $code   = $result->getStatusCode();
        $body   = json_decode($result->getBody()->getContents(), true);

        $this->assertEquals(200, $code);
        $this->assertEquals('2019-05-31', $body['start_date']);
    }

}