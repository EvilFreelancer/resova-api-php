<?php

namespace Resova\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Exception;
use InvalidArgumentException;
use Resova\Models\Extra as Model;

class ModelTest extends TestCase
{

    public function testSetRequired()
    {
        $args = [
            'quantity' => 123,
            'extra_id' => 456,
        ];
        $obj = new Model($args);
        $obj->setRequired(['quantity', 'extra_id']);
        $this->assertArrayHasKey('extra_id', $obj->toArray());
        $this->assertArrayHasKey('quantity', $obj->toArray());
    }

    public function test__set()
    {
        $args = [
            'dummy' => 123,
            'extra_id' => 456,
        ];
        $this->expectException(InvalidArgumentException::class);
        $obj = new Model();
        $obj->quantity = 123;
        $this->assertEquals($obj->quantity, 123);
        new Model($args);
    }

    public function test__isset()
    {
        $obj = new Model();
        $obj->quantity = 123;
        $this->assertTrue(isset($obj->quantity));
    }

    public function test__get()
    {
        $obj = new Model();
        $obj->quantity = 123;
        $this->assertEquals($obj->quantity, 123);
    }

    public function testToArray()
    {
        $args = [
            'quantity' => 123,
            'extra_id' => 456,
        ];
        $obj = new Model($args);
        $obj->setRequired(['quantity', 'extra_id']);
        $this->assertIsArray($obj->toArray());
        $this->assertArrayHasKey('extra_id', $obj->toArray());
        $this->expectException(InvalidArgumentException::class);
        $obj = new Model(['quantity' => 123]);
        $obj->setRequired(['quantity', 'extra_id']);
        $obj->toArray();
    }

    public function test__construct()
    {
        try {
            $obj = new Model();
            $this->assertIsObject($obj);
            $this->assertInstanceOf(Model::class, $obj);
        } catch (Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }
}
