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
     * @param string $hashing
     * @return string
     * @throws DataSmokeException
     */
    public function hash(string $hashing = DataSmoke::MD5_HASH_METHOD) : string
    {
        $returnStr = null;
        $cleanStr = $this->RandomStr();

        if(null === $cleanStr || strlen($cleanStr) == 0)
        {
            throw new DataSmokeException('Random string must not be null or empty!');
        }

        switch($hashing)
        {
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
     * @param int $lenght
     * @return string
     * @throws DataSmokeException
     */
    public function simple() : string
    {
        //that is just an alias for private function RandomStr
        $string = $this->RandomStr();

        if(null === $string || strlen($string) == 0)
        {
            throw new DataSmokeException('Random string must not be null or empty!');
        }

        return $string;
    }


    /**
     * @param int $length
     * @return string
     * @throws \Exception
     */
    private function RandomStr() : string
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