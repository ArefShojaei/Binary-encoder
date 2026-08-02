<?php

namespace App\Services;

use Kit\Support\Binary as Factory;
use Routex\Utils\Config;

final class BinaryService
{
    private Factory $binary;

    public function __construct()
    {
        $key = Config::get("binary.key");

        $this->binary = Factory::create($key);
    }

    public function encode(string $text): string
    {
        return $this->binary->encode($text);
    }

    public function decode(string $binary): string
    {
        return $this->binary->decode($binary);
    }
}
