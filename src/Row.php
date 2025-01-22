<?php

declare(strict_types=1);

namespace cstuder\ParseValueholder;

use Iterator;
use JsonSerializable;

/**
 * An array of Values
 */
class Row implements Iterator, JsonSerializable
{
    /**
     * Row values
     * 
     * @var Value[] $values
     */
    protected array $values = [];

    /**
     * Iterable position
     * 
     * @var int $position
     */
    protected int $position = 0;

    /**
     * Construct a new row with optional initial values
     * 
     * @param ?Value[] $values
     */
    public function __construct(?array $values = null)
    {
        if (is_null($values)) {
            return;
        }

        // Check types in array
        foreach ($values as $index => $value) {
            $type = get_class($value);

            if ($type !== Value::class) {
                throw new \TypeError("Row only accepts objects of type 'Value', but got object of type '{$type}' on index {$index} instead.");
            }
        }

        $this->values = $values;
    }

    public function jsonSerialize(): array {
        return $this->values;
     }

    /**
     * Append a value to the row
     * 
     * @param Value $value
     */
    public function append(Value $value): void
    {
        $this->values[] = $value;
    }

    /**
     * Gets values array
     * 
     * @return Values[] Array of Values
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * Number of values in row
     * 
     * @return int Count
     */
    public function getCount(): int
    {
        return count($this->values);
    }

    /**
     * Gets set of locations
     * 
     * @return string[] Set of distinct location names
     */
    public function getLocations(): array
    {
        return $this->getFieldSet('location');
    }

    /**
     * Gets set of parameters
     * 
     * @return string[] Set of distinct parameter names
     */
    public function getParameters(): array
    {
        return $this->getFieldSet('parameter');
    }

    /**
     * Gets set of timestamps
     * 
     * @return int[] Set of distinct timestamps
     */
    public function getTimestamps(): array
    {
        return $this->getFieldSet('timestamp');
    }

    protected function getFieldSet(string $fieldname): array
    {
        $allFields = array_map(function (Value $v) use ($fieldname) {
            return $v->$fieldname;
        }, $this->values);

        return array_unique($allFields);
    }

    /* Iterator methods start here */

    #[\ReturnTypeWillChange]
    public function current(): Value
    {
        return $this->values[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    #[\ReturnTypeWillChange]
    public function key(): int
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->values[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}
