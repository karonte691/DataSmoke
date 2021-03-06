<?php

declare(strict_types=1);

namespace DataSmoke\Lib\Generator;

/**
 * Class RandomBoolean
 */
final class RandomBoolean
{
    /**
     * Generate random bool(true/false)
     *
     * @return bool
     * @throws \Exception
     */
    public function value(): bool
    {
        return (bool)\random_int(0, 1);
    }
}
