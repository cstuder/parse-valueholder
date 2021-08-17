<?php

use cstuder\ParseValueholder\Row;
use cstuder\ParseValueholder\Value;
use PHPUnit\Framework\TestCase;

class RowTest extends TestCase
{
    protected $array = [];

    protected function setUp(): void
    {
        $this->array = [
            new Value(1, 'here', 'something', 42),
            new Value(3, 'there', 'somewhat', 11),
            new Value(2, 'where', 'someone', 'asdf'),
        ];
    }

    public function testEmptyConstructor(): void
    {
        $empty = new Row();

        $this->assertEmpty($empty->values);
    }

    public function testConstructor(): void
    {
        $row = new Row($this->array);

        $this->assertCount(3, $row->values);
    }

    public function testAppend(): void
    {
        $value = new Value(123, 'a', 'b', 'c');
        $row = new Row($this->array);

        $row->append($value);

        $this->assertCount(4, $row->values);
        $this->assertEquals($value, $row->values[3]);
    }

    public function testInvalidObjectInConstructor(): void
    {
        $this->expectException('TypeError');

        $this->array[] = 'not_a_value';

        new Row($this->array);
    }

    public function testInvalidAppend(): void
    {
        $this->expectException('TypeError');

        $value = 'not_a_value';
        $row = new Row($this->array);

        $row->append($value);
    }
}
