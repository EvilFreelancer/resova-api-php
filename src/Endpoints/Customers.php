<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Models\Customer;

class Customers extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Create a customer
     * Creates a new customer object.
     *
     * @param Customer $customer
     *
     * @return $this
     */
    public function create(Customer $customer): self
    {
        $customer->setRequired([
            'first_name',
            'last_name',
            'email',
        ]);

        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/customers';
        $this->params   = $customer;
        $this->response = Customer::class;

        return $this;
    }

    /**
     * Retrieve a customer
     * Retrieves the details of a customer. Provide the unique id for the customer.
     *
     * @param int $customer_id The customer id
     *
     * @return $this
     */
    public function __invoke(int $customer_id): self
    {
        $this->customer_id = $customer_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/customers/' . $customer_id;
        $this->response = Customer::class;

        return $this;
    }

    /**
     * Create a customer
     * Creates a new customer object.
     *
     * @param Customer $customer
     *
     * @return $this
     */
    public function update(Customer $customer): self
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/customers/' . $this->customer_id;
        $this->params   = $customer;
        $this->response = Customer::class;

        return $this;
    }
}
