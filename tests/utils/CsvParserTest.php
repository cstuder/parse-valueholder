<?php

use cstuder\ParseValueholder\Utils\CsvParser;
use PHPUnit\Framework\TestCase;

class CsvParserTest extends TestCase
{
    public function testParseEmptyString()
    {
        $string = '';

        $data = CsvParser::parseString($string);

        $this->assertEmpty($data->getValues());
    }

    public function testParseSimpleString()
    {
        $string = "123;a;b;c\n124;a;b;5\n\n";

        $data = CsvParser::parseString($string, ';');

        $this->assertEquals(2, $data->getCount());
        $this->assertEquals(124, $data->getValues()[1]->timestamp);
    }

    public function testParseFileEmpty()
    {
        $filename = __DIR__ . '/resources/empty.csv';

        $data = CsvParser::parseFile($filename, ';');

        $this->assertEmpty($data->getValues());
    }


    public function testParseFileValid()
    {
        $filename = __DIR__ . '/resources/valid.csv';

        $data = CsvParser::parseFile($filename);

        $this->assertEquals(2, $data->getCount());
        $this->assertEquals(124, $data->getValues()[1]->timestamp);
    }

    public function testParseFileInvalid()
    {
        $this->expectException('InvalidArgumentException');

        $filename = __DIR__ . '/resources/invalid.csv';

        $data = CsvParser::parseFile($filename, ';');
    }
}
