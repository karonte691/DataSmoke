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

    /**
     * @test
     */
    public function itWillGenerateAValidUuuidV4RandomString() : void
    {
        $validUuuidV4 = '/^[0-9A-F]{8}-[0-9A-F]{4}-4[0-9A-F]{3}-[89AB][0-9A-F]{3}-[0-9A-F]{12}$/i';

        $generator = new RandomString();

        $string = $generator->uuidv4();

        $this->assertNotNull($string);

        $this->assertTrue(preg_match($validUuuidV4, $string) == 1);
    }

    /**
     * @test
     */
    public function itWillGenerateARandomChar() : void
    {
        $generator = new RandomString();

        $char = $generator->char();

        $this->assertNotNull($char);
        $this->assertIsString($char);
        $this->assertEquals(1, strlen($char));

        $newChar = $generator->char();

        $this->assertNotEquals($char, $newChar);
    }
}