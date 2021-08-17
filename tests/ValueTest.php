<?php

use cstuder\ParseValueholder\Value;
use PHPUnit\Framework\TestCase;

class ValueTest extends TestCase
{
    public function testConstructor(): void
    {
        $data = new Value(15, 'here', 'something', 42);

        $this->assertEquals(15, $data->timestamp);
        $this->assertEquals('here', $data->location);
        $this->assertEquals('something', $data->parameter);
        $this->assertEquals(42, $data->value);
    }

    public function testNullValue(): void
    {
        $data = new Value(15, 'here', 'something', null);

        $this->assertEquals(15, $data->timestamp);
        $this->assertEquals('here', $data->location);
        $this->assertEquals('something', $data->parameter);
        $this->assertNull($data->value);
    }

    public function testWrongTimestampType(): void
    {
        $this->expectException(TypeError::class);

        new Value('now', 'here', 'something', null);
    }
}
