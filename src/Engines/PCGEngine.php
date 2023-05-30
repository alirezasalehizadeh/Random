<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random\Engines;

use Alirezasalehizadeh\Random\Engines\Engine;
use \Random\Engine\PcgOneseq128XslRr64 as RandomPCG;

class PCGEngine extends Engine
{

    /**
     * Engine instance
     *
     * @var \Alirezasalehizadeh\Random\Engines\Engine
     */
    protected $engine;

    public function __construct()
    {
        $this->engine = new RandomPCG;
    }

    /**
     * Generate an random string with `PCG` engine
     *
     * @return string
     */
    public function generate(): string
    {
        return $this->engine->generate();
    }

    /**
     * Efficiently move the engine ahead multiple steps
     *
     * @param integer $advance
     * @return void
     */
    public function jump(int $advance): void
    {
        $this->engine->jump($advance);
    }
}
