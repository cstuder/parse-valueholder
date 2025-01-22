# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [0.2.2] - 2025-01-22

- Makes `Value` and `Row` JSON serializable.

## [0.2.1] - 2023-02-09

- `CsvParser` casts to float on all values.

## [0.2.0] - 2023-02-01

- Makes the `values` field protected, use `getValues()` instead.
- Makes the `Row` class iterable.
- Adds `Row` metadata functions.
- Adds utility `CsvParser`.

## [0.1.1] - 2023-01-30

- Fixes broken composer.lock file.

## [0.1.0] - 2023-01-30

- Changes minimum requirement to PHP 8.1.
- All Value fields are now readonly.

## [0.0.3] - 2021-08-24

- Adds more type annotations.

## [0.0.2] - 2021-08-17

- Adds Row class.

## [0.0.1] - 2021-08-17

- Initial release, compatible with versions below PHP 8.1.
