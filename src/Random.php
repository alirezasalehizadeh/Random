<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random;

use Alirezasalehizadeh\Random\Engines\Engine;
use \Random\Randomizer;

class Random
{

    /**
     * Randomizer instance
     *
     * @var \Random\Randomizer
     */
    private $random;

    /**
     * Engine instance
     *
     * @var \Alirezasalehizadeh\Random\Engines\Engine
     */
    private $engine;

    public function __construct(Engine $engine = null)
    {
        $this->engine = $engine;
        $this->random = new Randomizer($this->engine);
    }

    /**
     * Generate an random string with specific length
     *
     * @param integer $length
     * @return string
     */
    public function randomString(int $length): string
    {
        return $this->random->getBytes($length);
    }

    /**
     * Generate an random string from given string
     *
     * @param string $bytes
     * @return string
     */
    public function pickString(string $bytes): string
    {
        return $this->random->shuffleBytes($bytes);
    }

    /**
     * Generate an random int
     *
     * @return integer
     */
    public function randomInt(): int
    {
        return $this->random->nextInt();
    }

    /**
     * Pick an random int between min and max
     *
     * @param integer $min
     * @param integer $max
     * @return integer
     */
    public function pickInt(int $min, int $max): int
    {
        if (($max - $min) > getrandmax()) {

            throw new \Random\RandomException("This value are over than maximum!");
        }

        return $this->random->getInt($min, $max);
    }

    /**
     * Generate an random array from given array
     *
     * @param array $array
     * @return array
     */
    public function randomArray(array $array): array
    {
        return $this->random->shuffleArray($array);
    }

    /**
     * Pick random elements from given array
     *
     * @param array $array
     * @param integer $num
     * @return array
     */
    public function choice(array $array, int $num = 1): array
    {
        return $this->random->pickArrayKeys(array_flip($array), $num);
    }

    public function setEngine(Engine $engine = null)
    {
        $this->engine = $engine;

        return $this;
    }

    public function getEngine()
    {
        return $this->engine;
    }
}
