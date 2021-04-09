<?php

declare(strict_types=1);

namespace DataSmoke\Tests\Generator;

use DataSmoke\Lib\Generator\RandomDate;
use PHPUnit\Framework\TestCase;

final class RandomDateTest extends TestCase
{
    /**
     * @test
     */
    public function itWillGenerateRandomDate() : void
    {
        $generator = new RandomDate();

        $date = $generator->value();

        $this->assertNotNull($date);

        $this->assertInstanceOf(\DateTime::class, $date);


        //avoiding duplicate
        $dateNew = $generator->value();

        $this->assertNotEquals($date, $dateNew);
    }

}