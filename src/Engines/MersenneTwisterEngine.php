<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random\Engines;

use Alirezasalehizadeh\Random\Engines\Engine;
use \Random\Engine\Mt19937 as RandomMersenneTwister;

class MersenneTwisterEngine extends Engine
{
    /**
     * Engine instance
     *
     * @var \Alirezasalehizadeh\Random\Engines\Engine
     */
    protected $engine;

    public function __construct()
    {
        $this->engine = new RandomMersenneTwister;
    }

    /**
     * Generate an random string with `Mersenne Twister` engine
     *
     * @return string
     */
    public function generate(): string
    {
        return $this->engine->generate();
    }
}
