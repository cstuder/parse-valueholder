# parse-valueholder

PHP value holder objects for [parse-hydrodaten](https://github.com/cstuder/parse-hydrodaten) and [parse-swissmetnet](https://github.com/cstuder/parse-swissmetnet)

This simple library provides immutable typed value holder objects(DTO) with the fields timestamp, location, parameter and value.

Once PHP 8.1 is released, the fields will be turned `readonly`.

## Example

```php
$data = new cstuder\ParseValueHolder\Value(
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
