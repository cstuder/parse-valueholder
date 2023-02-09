<?php

declare(strict_types=1);

namespace cstuder\ParseValueholder\Utils;

use cstuder\ParseValueholder\Row;
use cstuder\ParseValueholder\Value;

/**
 * Parses CSV files or strings into Row/Value objects
 */
class CsvParser
{
    public static function parseFile(
        string $filename,
        string $separator = ',',
        string $enclosure = '"',
        string $escape = "\\"
    ): Row {
        $row = new Row();
        $file = fopen($filename, 'r');

        while (($data = fgetcsv($file, null, $separator, $enclosure, $escape)) !== false) {
            if (count($data) == 1) {
                continue;
            }

            $row->append(self::convertLineToValue($data));
        }

        return $row;
    }

    public static function parseString(
        string $csv,
        string $separator = ',',
        string $enclosure = '"',
        string $escape = "\\"
    ): Row {
        $row = new Row();

        foreach (explode("\n", $csv) as $line) {
            if (empty($line)) {
                continue;
            }

            $data = str_getcsv($line, $separator, $enclosure, $escape);

            $row->append(self::convertLineToValue($data));
        }

        return $row;
    }

    protected static function convertLineToValue(array $data): Value
    {
        if (count($data) != 4) {
            throw new \InvalidArgumentException('Invalid parsed data line: ' . print_r($data, true));
        }

        return new Value((int) $data[0], (string) $data[1], (string) $data[2], (float) $data[3]);
    }
}
