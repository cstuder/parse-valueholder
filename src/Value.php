<?php

declare(strict_types=1);

namespace cstuder\ParseValueholder;

class Value
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
}
