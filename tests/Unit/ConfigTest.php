<?php

namespace Resova\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Exception;
use ErrorException;
use Resova\Config;

class ConfigTest extends TestCase
{

    public function testAll(): void
    {
        $obj = new Config();
        $this->assertIsArray($obj->all());
    }

    public function test__construct(): void
    {
        try {
            $obj = new Config();
            $this->assertIsObject($obj);
            $this->assertInstanceOf(Config::class, $obj);
        } catch (Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function testSet(): void
    {
        $this->expectException(ErrorException::class);
        $obj = new Config(['dummy' => 'dummy']);
    }

    public function testGuzzle(): void
    {
        $obj          = new Config();
        $obj->api_key = 'test';
        $array        = $obj->guzzle();

        $this->assertIsArray($array);
        $this->assertArrayHasKey('timeout', $array);
    }

    public function testGet(): void
    {
        $this->expectException(ErrorException::class);
        $obj = new Config();
        $this->assertEquals(10, $obj->get('seconds'));
        $this->assertNull($obj->get('dummy'));
    }
}
