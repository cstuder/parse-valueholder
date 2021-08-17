<?php

declare(strict_types=1);

namespace cstuder\ParseValueholder;

class Value
{
    public int $timestamp;
    public string $location;
    public string $parameter;
    public mixed $value;

    public function __construct(int $timestamp, string $location, string $parameter, mixed $value)
    {
        $this->timestamp = $timestamp;
        $this->location = $location;
        $this->parameter = $parameter;
        $this->value = $value;
    }
}
