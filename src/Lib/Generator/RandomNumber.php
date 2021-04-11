<?php

declare(strict_types=1);

namespace DataSmoke\Lib\Generator;

/**
 * Class RandomNumber
 * @package DataSmoke
 */
final class RandomNumber
{
    /**
     * Return random integer(0,1,2...100)
     * @return int
     */
    public function int(): int
    {
        return mt_rand(0, 100);
    }

    /**
     * Generate a random bigint
     * @return int
     */
    public function complexInt(): int
    {
        return mt_rand();
    }

    /**
     * Generate random float number
     *
     * @return float
     */
    public function float(): float
    {
        return mt_rand() / mt_getrandmax();
    }
}
