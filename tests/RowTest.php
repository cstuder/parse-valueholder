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
            new Value(2, 'where', 'something', 'asdf'),
        ];
    }

    public function testEmptyConstructor(): void
    {
        $empty = new Row();

        $this->assertEquals(0, $empty->getCount());
        $this->assertEmpty($empty->getValues());
    }

    public function testConstructor(): void
    {
        $row = new Row($this->array);

        $this->assertEquals(3, $row->getCount());
        $this->assertCount(3, $row->getValues());
    }

    public function testAppend(): void
    {
        $value = new Value(123, 'a', 'b', 'c');
        $row = new Row($this->array);

        $row->append($value);

        $this->assertEquals(4, $row->getCount());
        $this->assertEquals($value, $row->getValues()[3]);
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

    public function testIterator(): void
    {
        $row = new Row($this->array);

        foreach ($row as $value) {
            $this->assertInstanceOf('cstuder\ParseValueholder\Value', $value);
        }
    }

    public function testLocations(): void
    {
        $row = new Row($this->array);

        $this->assertCount(3, $row->getLocations());
    }

    public function testParameters(): void
    {
        $row = new Row($this->array);

        $this->assertCount(2, $row->getParameters());
    }

    public function testTimestamps(): void
    {
        $row = new Row($this->array);

        $this->assertCount(3, $row->getTimestamps());
    }

    public function testJsonSerialize(): void
    {
        $row = new Row($this->array);
        $json = json_encode($row);

        $this->assertEquals([
            [
                'timestamp' => 1,
                'location' => 'here',
                'parameter' => 'something',
                'value' => 42,
            ],
            [
                'timestamp' => 3,
                'location' => 'there',
                'parameter' => 'somewhat',
                'value' => 11,
            ],
            [
                'timestamp' => 2,
                'location' => 'where',
                'parameter' => 'something',
                'value' => 'asdf',
            ],
        ], json_decode($json, true));
    }
}
