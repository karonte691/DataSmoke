<?php

declare(strict_types=1);

namespace DataSmoke\Tests;

use DataSmoke\DataSmoke;
use PHPUnit\Framework\TestCase;

final class DataSmokeTest extends TestCase
{
    /**
     * @test
     */
    public function allMethodAreAccessible() : void
    {
        //all the classes are already tested, here we just check if all method are ok
        DataSmoke::inizialize();

        $number = DataSmoke::Number()->int();
        $float = DataSmoke::Number()->float();
        $bool = DataSmoke::Bool()->value();
        $string = DataSmoke::String()->simple();
        $hash = DataSmoke::String()->hash();
        $date = DataSmoke::Date()->value();

        $this->assertIsInt($number);
        $this->assertIsFloat($float);
        $this->assertIsBool($bool);
        $this->assertIsString($string);
        $this->assertTrue(preg_match('/^[a-f0-9]{32}$/', $hash) == 1);
        $this->assertInstanceOf(\DateTime::class, $date);

    }

}