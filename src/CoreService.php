<?php

namespace Nikolag\Core;

use Nikolag\Core\CoreConfig;

class CoreService extends CoreConfig
{
    /**
     * @var array
     */
    private $drivers;

    public function __construct()
    {
        parent::__construct();
        $this->drivers = $this->getConfigAsJson()->connections;
    }

    /**
     * Returns the specified service
     *
     * @param string $driver
     * @return CorePaymentService
     */
    public function use(string $driver)
    {
        return resolve($this->drivers->{$driver}->namespace);
    }

    /**
     * Returns the default service
     *
     * @return CorePaymentService
     */
    public function default()
    {
        return resolve($this->drivers->{$this->getConfigAsJson()->default}->namespace);
    }

    /**
     * Returns all available drivers
     * which u have installed.
     *
     * @return array
     */
    public function availableDrivers()
    {
        return array_keys($this->drivers);
    }
}
