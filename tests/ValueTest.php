<?php


use PHPUnit\Framework\TestCase;

class ValueTest extends TestCase
{
    public function testConstructor()
    {
        $data = new \cstuder\ParseValueholder\Value(15, 'here', 'something', 42);

        $this->assertEquals(15, $data->timestamp);
        $this->assertEquals('here', $data->location);
        $this->assertEquals('something', $data->parameter);
        $this->assertEquals(42, $data->value);
    }

    public function testNullValue()
    {
        $data = new \cstuder\ParseValueholder\Value(15, 'here', 'something', null);

        $this->assertEquals(15, $data->timestamp);
        $this->assertEquals('here', $data->location);
        $this->assertEquals('something', $data->parameter);
        $this->assertNull($data->value);
    }

    public function testWrongTimestampType()
    {
        $this->expectException(TypeError::class);

        $data = new \cstuder\ParseValueholder\Value('now', 'here', 'something', null);
    }
}
