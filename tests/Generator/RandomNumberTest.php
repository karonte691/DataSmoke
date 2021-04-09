<?php

declare(strict_types=1);

namespace DataSmoke\Tests\Generator;

use DataSmoke\Lib\Generator\RandomNumber;
use PHPUnit\Framework\TestCase;

final class RandomNumberTest extends TestCase
{
    /**
     * @test
     */
    public function itWillGenerateASimpleIntNumber() : void
    {
        $generator = new RandomNumber();

        $number = $generator->int();

        $this->assertNotNull($number);
        $this->assertIsInt($number);
        $this->assertLessThanOrEqual(100, $number);

        //avoid duplicating the number
        $numberTwo = $generator->int();

        $this->assertNotEquals($number, $numberTwo);
    }

    /**
     * @test
     */
    public function itWillGenerateAComplexIntNumber() : void
    {
        $generator = new RandomNumber();

        $number = $generator->complexInt();

        $this->assertNotNull($number);
        $this->assertIsInt($number);
        $this->assertGreaterThan(100, $number);

    }

    /**
     * @test
     */
    public function itWillGenerateASimpleFloatNumber() : void
    {
        $generator = new RandomNumber();

        $number = $generator->float();

        $this->assertNotNull($number);
        $this->assertIsFloat($number);

        //avoid duplicating the number
        $numberTwo = $generator->float();

        $this->assertNotEquals($number, $numberTwo);

    }



}