<?php

namespace Nikolag\Core\Traits;

trait Jsonable
{
    /**
     * Returns config as json.
     *
     * @return object
     */
    public function getConfigAsJson(): object
    {
        return json_decode(json_encode($this->config));
    }
}
