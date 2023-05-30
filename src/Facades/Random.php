<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random\Facades;

use Alirezasalehizadeh\Random\Random as Rand;

class Random
{
    /**
     * Random instance
     *
     * @var \Alirezasalehizadeh\Random\Random|null
     */
    private static ?Rand $random;

    /**
     * Generate an random string with specific length
     *
     * @param integer $length
     * @return string
     */
    public static function randomString(int $length): string
    {
        return self::getInstance()->randomString($length);
    }

    /**
     * Generate an random string from given string
     *
     * @param string $bytes
     * @return string
     */
    public static function pickString(string $bytes): string
    {
        return self::getInstance()->pickString($bytes);
    }

    /**
     * Generate an random int
     *
     * @return integer
     */
    public static function randomInt(): int
    {
        return self::getInstance()->randomInt();
    }

    /**
     * Pick an random int between min and max
     *
     * @param integer $min
     * @param integer $max
     * @return integer
     */
    public static function pickInt(int $min, int $max): int
    {
        return self::getInstance()->pickInt($min, $max);
    }

    /**
     * Generate an random array from given array
     *
     * @param array $array
     * @return array
     */
    public static function randomArray(array $array): array
    {
        return self::getInstance()->randomArray($array);
    }

    /**
     * Pick random elements from given array
     *
     * @param array $array
     * @param integer $num
     * @return array
     */
    public static function choice(array $array, int $num = 1): array
    {
        return self::getInstance()->choice($array, $num);
    }

    private static function getInstance()
    {
        return self::$random ?? new Rand;
    }
}
