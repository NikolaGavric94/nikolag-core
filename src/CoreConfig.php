<?php

namespace Nikolag\Core;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\File;
use Nikolag\Core\Contracts\CoreConfigContract;
use Nikolag\Core\Exceptions\InvalidConfigurationException;
use Nikolag\Core\Traits\Arrayable;
use Nikolag\Core\Traits\Jsonable;

class CoreConfig
{
    use Arrayable, Jsonable;

    /**
     * @var array
     */
    protected $config;

    public function __construct()
    {
        $config = config('nikolag');
        $this->checkConfigValidity($config);
        $this->config = $config;
    }

    /**
     * Check validity of configuration file.
     *
     * @param mixed $config
     * @throws InvalidConfigurationException if the config provided is empty or not
     * complete
     * @return void
     */
    public final function checkConfigValidity($config)
    {
        if (empty($config) || !isset($config)) {
            throw new InvalidConfigurationException(
                "Configuration file is missing or not complete",
                500
            );
        }
    }
}
