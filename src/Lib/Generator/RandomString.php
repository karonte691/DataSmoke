<?php

declare(strict_types=1);

namespace DataSmoke\Lib\Generator;

use DataSmoke\DataSmoke;
use DataSmoke\Lib\Exception\DataSmokeException;

/**
 * Class RandomString
 * @package DataSmoke
 */
final class RandomString
{

    /**
     * Generated an hashed random string based on hashing method provider.
     * Currently supported hashing method are:
     *    - MD5
     *    - SHA1
     *    - SHA25
     *
     *  All defined in src/DataSmoke as constant
     *
     * @param string $hashing
     * @return string
     * @throws DataSmokeException
     */
    public function hash(string $hashing = DataSmoke::MD5_HASH_METHOD): string
    {
        $returnStr = null;
        $cleanStr = $this->randomStr();

        if (null === $cleanStr || strlen($cleanStr) == 0) {
            throw new DataSmokeException('Random string must not be null or empty!');
        }

        switch ($hashing) {
            case DataSmoke::SHA1_HASH_METHOD:
                $returnStr = sha1($cleanStr);
                break;
            case DataSmoke::SHA256_HASH_METHOD:
                $returnStr = hash('sha256', $cleanStr);
                break;
            case DataSmoke::MD5_HASH_METHOD:
            default:
                $returnStr = md5($cleanStr);
                break;
        }

        return $returnStr;
    }

    /**
     * Generate a random 16 random string
     *
     * @param int $lenght
     * @return string
     * @throws DataSmokeException
     */
    public function simple(): string
    {
        //that is just an alias for private function RandomStr
        $string = $this->randomStr();

        if (null === $string || strlen($string) == 0) {
            throw new DataSmokeException('Random string must not be null or empty!');
        }

        return $string;
    }

    /**
     *
     * Generating an UUID V4 random string
     * @reference https://solvit.io/50064cf
     *
     * @return string
     */
    public function uuidv4(): string
    {
        $str = sprintf(
            '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0xffff)
        );

        if (null === $str || strlen($str) == 0) {
            throw new DataSmokeException('Uuidv4() string must not be null or empty!');
        }

        return $str;
    }

    /**
     * Generate a random CHAR
     *
     * @return string
     * @throws DataSmokeException
     */
    public function char(): string
    {
        $char = substr(md5(microtime()), mt_rand(0, 26), 1);

        if (null === $char || strlen($char) == 0) {
            throw new DataSmokeException('char() string must not be null or empty!');
        }

        return $char;
    }


    /**
     *
     * Internal function to use the random_bytes method if available, or generate
     * in the old-fashion way a systeeen string composed by random chars
     *
     * @param int $length
     * @return string
     * @throws \Exception
     */
    private function randomStr(): string
    {
        $length = 16;

        if (function_exists('random_bytes')) {
            return bin2hex(\random_bytes($length));
        }

        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length * 2; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }

        return $randomString;
    }
}
