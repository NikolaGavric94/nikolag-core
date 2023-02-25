<?php

namespace Nikolag\Core\Abstracts;

use Nikolag\Core\Traits\Arrayable;
use Nikolag\Core\Traits\Jsonable;

abstract class CorePaymentService
{
    use Arrayable, Jsonable;

    /**
     * @var mixed
     */
    protected mixed $customer;
    /**
     * @var mixed
     */
    protected mixed $merchant;
    /**
     * @var mixed
     */
    protected mixed $order;
    /**
     * @var array
     */
    protected array $config;

    /**
     * @return mixed
     */
    public function getCustomer(): mixed
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     *
     * @return self
     */
    public function setCustomer(mixed $customer): static
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMerchant(): mixed
    {
        return $this->merchant;
    }

    /**
     * @param mixed $merchant
     *
     * @return self
     */
    public function setMerchant(mixed $merchant): static
    {
        $this->merchant = $merchant;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOrder(): mixed
    {
        return $this->order;
    }

    /**
     * @return array
     */
    public function getConfig(): array
    {
        return $this->config;
    }

    /**
     * @param array $config
     *
     * @return self
     */
    public function setConfig(array $config): static
    {
        $this->config = $config;

        return $this;
    }
}
