<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random;

use Random\Engine;
use Random\Randomizer;
use Random\IntervalBoundary;

class Random
{

    /**
     * Randomizer instance
     *
     * @var Random\Randomizer
     */
    private static Randomizer $random;

    /**
     * Engine instance
     *
     * @var Random\Engine;
     */
    public ?Engine $engine;

    public function __construct(
        ?Engine $engine = null
    ) {
        $this->engine = $engine;
        self::$random = new Randomizer($engine);
    }

    /**
     * Generate an random bytes with specific length
     *
     * @param int $length
     * @return string
     */
    public static function byte(int $length): string
    {
        return self::getInstance()->getBytes($length);
    }

    /**
     * Generate an random string from given string
     *
     * @param string $bytes
     * @param int|null $length
     * @return string
     */
    public static function string(string $bytes, int|null $length = null): string
    {
        if ($length) {
            return self::getInstance()->getBytesFromString($bytes, $length);
        }

        return self::getInstance()->shuffleBytes($bytes);
    }

    /**
     * Generate an random int
     *
     * @param int|null $min
     * @param int|null $max
     * @return int
     */
    public static function int(int|null $min = null, int|null $max = null): int
    {
        if ($min && $max) {
            return self::getInstance()->getInt($min, $max);
        }

        return self::getInstance()->nextInt();
    }

    /**
     * Generate an random float
     *
     * @param float|null $min
     * @param float|null $max
     * @param Random\IntervalBoundary $boundary
     * @return float
     */
    public static function float(float|null $min = null, float|null $max = null, IntervalBoundary $boundary = IntervalBoundary::ClosedOpen): float
    {
        if ($min && $max) {
            return self::getInstance()->getFloat($min, $max, $boundary);
        }

        return self::getInstance()->nextFloat();
    }

    /**
     * Generate an random array from given array
     *
     * @param array $array
     * @return array
     */
    public static function array(array $array): array
    {
        return self::getInstance()->shuffleArray($array);
    }

    /**
     * Pick random elements from given array
     *
     * @param array $array
     * @param int $num
     * @return array
     */
    public static function pick(array $array, int $num = 1): array
    {
        return self::getInstance()->pickArrayKeys(array_flip($array), $num);
    }

    /**
     * Call the engine methods
     *
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    public function __call($name, $arguments)
    {
        if ($this->engine) {
            return $this->engine->$name(...$arguments);
        }
    }

    private static function getInstance(): Randomizer
    {
        return self::$random ?? new Randomizer;
    }
}
