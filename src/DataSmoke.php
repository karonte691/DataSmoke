<?php

namespace DataSmoke;

use DataSmoke\Lib\Generator\RandomBoolean;
use DataSmoke\Lib\Generator\RandomDate;
use DataSmoke\Lib\Generator\RandomNumber;
use DataSmoke\Lib\Generator\RandomString;

/**
*  DataSmoke Library
*
*  @author Luca Magistrelli
*/
class DataSmoke{
    private static RandomString $randomString;
    private static RandomNumber $randomNumber;
    private static RandomBoolean $randomBoolean;
    private static RandomDate  $randomDate;

    public const MD5_HASH_METHOD = 'md5';
    public const SHA1_HASH_METHOD = 'sha1';
    public const SHA256_HASH_METHOD = 'sha256';


    public static function inizialize() : void
    {
        self::$randomString = new RandomString();
        self::$randomBoolean = new RandomBoolean();
        self::$randomDate = new RandomDate();
        self::$randomNumber = new RandomNumber();

    }


    public static function String() {
        return self::$randomString;
    }

    public static function Number() {
        return self::$randomNumber;
    }

    public static function Date() {
        return self::$randomDate;
    }

    public static function Bool() {
        return self::$randomBoolean;
    }
}