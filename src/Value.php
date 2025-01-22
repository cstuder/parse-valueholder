<?php

declare(strict_types=1);

namespace cstuder\ParseValueholder;

use JsonSerializable;

class Value implements JsonSerializable
{
    /**
     * Construct a new immutable Value object with content
     * 
     * @param int $timestamp Timestamp
     * @param string $location Location name
     * @param string $parameter Parameter name
     * @param mixed $value Value
     */
    public function __construct(
        public readonly int $timestamp,
        public readonly string $location,
        public readonly string $parameter,
        public readonly mixed $value
    ) {
    }

    public function jsonSerialize(): array { 
        return [
            'timestamp' => $this->timestamp,
            'location' => $this->location,
            'parameter' => $this->parameter,
            'value' => $this->value,
        ];
    }
}
