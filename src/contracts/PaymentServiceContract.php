<?php

namespace Nikolag\Core\Contracts;

use Nikolag\Core\Exceptions\Exception;
use Nikolag\Core\Models\Transaction;

interface PaymentServiceContract
{
    /**
     * Save a transaction.
     *
     * @return self
     */
    public function save(): PaymentServiceContract;

    /**
     * Charge a customer.
     *
     * @param array $options
     *
     * @throws Exception on non-2xx response
     *
     * @return Transaction
     */
    public function charge(array $options): Transaction;

    /**
     * Get all payments from service provider.
     *
     * @param array $options
     *
     * @return mixed
     */
    public function payments(array $options): mixed;

    /**
     * Getter for customer.
     *
     * @return mixed
     */
    public function getCustomer(): mixed;

    /**
     * Setter for customer.
     *
     * @param mixed $customer
     *
     * @return PaymentServiceContract
     */
    public function setCustomer(mixed $customer): static;

    /**
     * Getter for customer.
     *
     * @return mixed
     */
    public function getMerchant(): mixed;

    /**
     * Setter for merchant.
     *
     * @param mixed $merchant
     *
     * @return PaymentServiceContract
     */
    public function setMerchant(mixed $merchant): static;

    /**
     * Getter for order.
     *
     * @return mixed
     */
    public function getOrder(): mixed;

    /**
     * Getter for config.
     *
     * @return CoreConfigContract
     */
    public function getConfig(): CoreConfigContract;

    /**
     * Setter for config.
     *
     * @param CoreConfigContract $config
     *
     * @return PaymentServiceContract
     */
    public function setConfig(CoreConfigContract $config): static;
}
