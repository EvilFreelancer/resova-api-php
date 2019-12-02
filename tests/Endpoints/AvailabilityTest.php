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
    private $handler;
    private $resova;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->handler = new MockHandler();

        // Config
        $config = new ResovaConfig();
        $config->set('handler', $this->handler);
        $config->set('api_key', '123456');
        $config->set('debug', true);

        // Resova client
        $this->resova = new ResovaClient($config);

        // Bodies
        $this->json = [
            'availability_calendar' => file_get_contents(__DIR__ . '/availability_calendar.json'),
        ];
    }

    public function testCalendar()
    {
        $this->handler->append(new Response(200, [], $this->json['availability_calendar']));

        $result = $this->resova->availability->calendar('1', '2', [1], 1)->exec();
        $code   = $result->getStatusCode();
        $body   = json_decode($result->getBody()->getContents(), false);

        $this->assertEquals(200, $code);
        $this->assertEquals('2019-05-31', $body->start_date);
    }

}
