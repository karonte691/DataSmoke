<?php

declare(strict_types=1);

namespace DataSmoke\Tests\Generator;

use DataSmoke\DataSmoke;
use DataSmoke\Lib\Generator\RandomString;
use PHPUnit\Framework\TestCase;

final class RandomStringTest extends TestCase
{
    /**
     * @test
     */
    public function itWillGenerateRandomString() : void
    {
        $generator = new RandomString();

        $string = $generator->simple();

        $this->assertNotNull($string);
        $this->assertTrue(is_string($string));
        $this->assertEquals(32, strlen($string));



        //we do not want that the generator give in output the same string twice
        $newString = $generator->simple();

        $this->assertNotEquals($string, $newString);
    }

    /**
     * @test
     */
    public function itWillGenerateAnHashedMd5String() : void
    {
        $generator = new RandomString();

        $string = $generator->hash();

        $this->assertNotNull($string);
        $this->assertTrue(is_string($string));
        $this->assertTrue(preg_match('/^[a-f0-9]{32}$/', $string) == 1);
    }

    /**
     * @test
     */
    public function itWillGenerateAnHashedSha1String() : void
    {
        $generator = new RandomString();

        $string = $generator->hash(DataSmoke::SHA1_HASH_METHOD);

        $this->assertNotNull($string);
        $this->assertTrue(preg_match('/^[0-9a-f]{40}$/i', $string) == 1);
    }

    /**
     * @test
     */
    public function itWillGenerateAnHashedSha256String() : void
    {
        $generator = new RandomString();

        $string = $generator->hash(DataSmoke::SHA256_HASH_METHOD);

        $this->assertNotNull($string);
        $this->assertTrue(preg_match("/^([a-f0-9]{64})$/", $string) == 1);


    }
}