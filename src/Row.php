<?php

declare(strict_types=1);

namespace cstuder\ParseValueholder;

/**
 * An array of Values
 */
class Row
{
    public array $values = [];

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

    public function append(Value $value)
    {
        $this->values[] = $value;
    }
}
