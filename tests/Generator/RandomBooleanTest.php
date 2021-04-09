<?php

declare(strict_types=1);

namespace DataSmoke\Tests\Generator;

use DataSmoke\Lib\Generator\RandomBoolean;
use PHPUnit\Framework\TestCase;

final class RandomBooleanTest extends TestCase
{
    /**
     * @test
     */
    public function itWillGenerateRandomBooleanValue() : void
    {
        $generator = new RandomBoolean();

        $value = $generator->value();

        $this->assertIsBool($value);


    }
}