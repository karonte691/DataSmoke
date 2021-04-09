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
     * @return int
     */
    public function int() : int
    {
        return mt_rand(0, 100);
    }

    /**
     * @return int
     */
    public function complexInt() : int
    {
        return mt_rand();
    }

    public function float() : float
    {
        return mt_rand() / mt_getrandmax();
    }
}