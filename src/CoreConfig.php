<?php

namespace Nikolag\Core;

use Nikolag\Core\Contracts\CoreConfigContract;
use Nikolag\Core\Exceptions\InvalidConfigurationException;
use Nikolag\Core\Traits\Arrayable;
use Nikolag\Core\Traits\Jsonable;

class CoreConfig implements CoreConfigContract
{
    use Arrayable, Jsonable;

    /**
     * @var array
     */
    protected mixed $config;

    /**
     * CoreConfig constructor.
     *
     * @throws InvalidConfigurationException
     */
    public function __construct()
    {
        $this->config = config('nikolag');
        $this->checkConfigValidity($this->config);
    }

    /**
     * Check validity of configuration file.
     *
     * @param mixed $config
     *
     * @throws InvalidConfigurationException if the config provided is empty or not
     *                                       complete
     *
     * @return void
     */
    final public function checkConfigValidity($config): void
    {
        if (empty($config)) {
            throw new InvalidConfigurationException(
                'Configuration file is missing or not complete',
                500
            );
        }
    }
}
