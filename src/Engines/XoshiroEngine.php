<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random\Engines;

use Alirezasalehizadeh\Random\Engines\Engine;
use \Random\Engine\Xoshiro256StarStar as RandomXoshiro;

class XoshiroEngine extends Engine
{

    /**
     * Engine instance
     *
     * @var \Alirezasalehizadeh\Random\Engines\Engine
     */
    protected $engine;

    public function __construct()
    {
        $this->engine = new RandomXoshiro;
    }

    /**
     * Generate an random string with `Xoshiro` engine
     *
     * @return string
     */
    public function generate(): string
    {
        return $this->engine->generate();
    }

    /**
     * Efficiently move the engine ahead by 2^128 steps
     *
     * @return void
     */
    public function jump(): void
    {
        $this->engine->jump();
    }

    /**
     * Efficiently move the engine ahead by 2^192 steps
     *
     * @return void
     */
    public function jumpLong(): void
    {
        $this->engine->jumpLong();
    }
}
