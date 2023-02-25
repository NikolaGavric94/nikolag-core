<?php

namespace Nikolag\Core\Contracts;

use Nikolag\Core\Exceptions\InvalidConfigurationException;

interface CoreConfigContract
{
    /**
     * Check validity of configuration file.
     *
     * @param array $config
     *
     * @throws InvalidConfigurationException if the config provided is empty or not
     *                                       complete
     *
     * @return void
     */
    public function checkConfigValidity(array $config): void;
}
