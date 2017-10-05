<?php

namespace Nikolag\Core\Contracts;

interface PaymentServiceContract
{
    /**
     * Save a transaction.
     *
     * @return void
     */
    public function save();
    /**
     * Charge a customer.
     *
     * @param array $options
     * @return \Nikolag\Square\Models\Transaction
     * @throws \Nikolag\Square\Exception on non-2xx response
     */
    public function charge(array $options);
    /**
     * Transactions directly from Square API.
     *
     * @param array $options
     * @return \SquareConnect\Model\ListLocationsResponse
     * @throws \Nikolag\Square\Exception on non-2xx response
     */
    public function transactions(array $options);
    /**
     * Getter for customer.
     *
     * @return mixed
     */
    public function getCustomer();
    /**
     * Setter for customer.
     *
     * @param mixed $customer
     * @return void
     */
    public function setCustomer($customer);
    /**
     * Getter for customer.
     *
     * @return mixed
     */
    public function getMerchant();
    /**
     * Setter for merchant.
     *
     * @param mixed $merchant
     * @return mixed
     */
    public function setMerchant($merchant);
    /**
     * Getter for config.
     *
     * @return array
     */
    public function getConfig();
    /**
     * Setter for config.
     *
     * @param array $config
     * @return void
     */
    public function setConfig(array $config);
}
