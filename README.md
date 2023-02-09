# parse-valueholder

[![PHPUnit tests](https://github.com/cstuder/parse-valueholder/actions/workflows/phpunit.yml/badge.svg)](https://github.com/cstuder/parse-valueholder/actions/workflows/phpunit.yml)

PHP value holder objects for [parse-hydrodaten](https://github.com/cstuder/parse-hydrodaten) and [parse-swissmetnet](https://github.com/cstuder/parse-swissmetnet)

This simple library provides immutable typed value holder objects (DTO) with the readonly fields timestamp, location, parameter and value.

Also provides a iterable row object containing an array of values and some simple statistic methods, along with a CSV parser.

## Example

Installation: `composer require cstuder/parse-valueholder`

```php
$data = new \cstuder\ParseValueholder\Value(
  $timestamp,
  $locationString,
  $parameterString,
  $value
);

echo $data->timestamp;
echo $data->location;
echo $data->parameter;
echo $data->value;
```

### Row of values

```php
$row = new \cstuder\ParseValueholder\Row([
  $value1,
  $value2
]);

$row->append($value3);

foreach($row as $value) {
  var_dump($value);
}
```

### CSV Parser

A simple CSV parser to parse CSV files without header, in the format `timestamp, location, parameter, value`, i.e.:

```csv
1675281000,BER,tt,5.7
```

Delimiters, enclosure and escape characters are configurable.

All values are cast to float.

Parses either from a file or from a string:

```php
$row = \cstuder\ParseValueholder\Utils\CsvParser::parseFile($filename);

$row2 = \cstuder\ParseValueholder\Utils\CsvParser::parseString("1675281000,BER,tt,5.7\n1675281600,BER,tt,5.8");
```

## Testing

Run `composer test` to execute the PHPUnit test suite.

## Releasing

1. Add changes to the [changelog](CHANGELOG.md).
1. Create a new tag `vX.X.X`.
1. Push.

## License

MIT.

## Author

Christian Studer <cstuder@existenz.ch>, Bureau für digitale Existenz.
