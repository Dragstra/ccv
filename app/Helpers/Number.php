<?php


namespace App\Helpers;


class Number
{
    /**
     * Produce a number without decimals
     * @param float $floatNumber
     * @return int
     */
    public static function ToInteger(float $floatNumber) : int
    {
        return $floatNumber * 100;
    }

    /**
     * Produce a decimal number from an integer
     * @param int $integer
     * @return float
     */
    public static function ToDecimal(int $integer) : float
    {
        return $integer / 100;
    }
}
