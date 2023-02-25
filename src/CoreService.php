<?php

namespace Nikolag\Core;

use Nikolag\Core\Contracts\PaymentServiceContract;

class CoreService extends CoreConfig
{
    /**
     * @var array
     */
    private array $drivers;

    public function __construct()
    {
        parent::__construct();
        $this->drivers = $this->getConfigAsJson()->connections;
    }

    /**
     * Returns instance of the specified service.
     *
     * @param string $driver
     *
     * @return PaymentServiceContract
     */
    public function use(string $driver): PaymentServiceContract
    {
        return resolve($this->drivers->{$driver}->namespace);
    }

    /**
     * Returns instance of the default service.
     *
     * @return PaymentServiceContract
     */
    public function default(): PaymentServiceContract
    {
        return resolve($this->drivers->{$this->getConfigAsJson()->default}->namespace);
    }

    /**
     * Returns all available drivers
     * which u have installed.
     *
     * @return array
     */
    public function availableDrivers(): array
    {
        return array_keys($this->drivers);
    }
}
