<?php

declare(strict_types=1);

namespace Alirezasalehizadeh\Random\Engines;

use \Random\Engine as RandomEngineInterface;

abstract class Engine implements RandomEngineInterface
{
    protected $engine;
}
