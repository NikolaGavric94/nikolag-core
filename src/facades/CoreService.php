<?php

namespace Nikolag\Core\Facades;

use Illuminate\Support\Facades\Facade;
use Nikolag\Core\CoreService as CoreServiceConcrete;

class CoreService extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return CoreServiceConcrete::class;
    }
}
