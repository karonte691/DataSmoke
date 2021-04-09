<?php

declare(strict_types=1);

namespace DataSmoke\Lib\Generator;

/**
 * Class RandomDate
 * @package DataSmoke
 */
final class RandomDate
{
    /**
     * @return \DateTime
     * @throws \Exception
     */
    public function value() : \DateTime
    {
        $firsTime = strtotime(date('Y-m-d'));
        $secondTime = $firsTime+86400;

        $randtime = rand($firsTime, $secondTime);
        $randdate = date('Y-m-d g:i:s A', $randtime);

        $finalDate = new \DateTime($randdate);

        return $finalDate;
    }
}