<?php

namespace Nikolag\Core\Traits;

trait Arrayable
{
    /**
     * Returns config as array.
     *
     * @return object
     */
    public function getConfigAsArray(): object
    {
        return (object) $this->config;
    }
}
