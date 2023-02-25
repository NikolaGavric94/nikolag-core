<?php

namespace Nikolag\Core\Abstracts;

use Nikolag\Core\Contracts\CoreConfigContract;
use Nikolag\Core\Traits\Arrayable;
use Nikolag\Core\Traits\Jsonable;

abstract class CorePaymentService
{
    use Arrayable, Jsonable;

    /**
     * @var mixed
     */
    protected mixed $customer = null;
    /**
     * @var mixed
     */
    protected mixed $merchant = null;
    /**
     * @var mixed
     */
    protected mixed $order = null;
    /**
     * @var CoreConfigContract
     */
    protected CoreConfigContract $config;

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
     * @return CoreConfigContract
     */
    public function getConfig(): CoreConfigContract
    {
        return $this->config;
    }

    /**
     * @param CoreConfigContract $config
     *
     * @return self
     */
    public function setConfig(CoreConfigContract $config): static
    {
        $this->config = $config;

        return $this;
    }
}
