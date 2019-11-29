<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Interfaces\QueryInterface;
use Resova\Models\Customer;
use Resova\Models\CustomerCreate;

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
     * @param CustomerCreate $customer
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function create(CustomerCreate $customer): QueryInterface
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
     * @return \Resova\Interfaces\QueryInterface
     */
    public function update(Customer $customer): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/customers/' . $this->customer_id;
        $this->params   = $customer;
        $this->response = Customer::class;

        return $this;
    }

    /**
     * Try to find customer by string
     *
     * INFO: It work only in frontend mode
     *
     * @param string $string
     * @param int    $page
     * @param int    $limit
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function search(string $string, int $page = 1, int $limit = 500): QueryInterface
    {
        $params = [
            'page'   => $page,
            'limit'  => $limit,
            'search' => $string,
        ];

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/customers' . '?' . http_build_query($params);

        // TODO: array of customers like below
        // current_page: 1
        // data: [{id: 1, reference: "some-hash", ip: "123.123.123.123", first_name: "Test",…}] // TODO: here array of Customer objects
        // last_page: 1
        // overall_total: 1
        // per_page: 500
        // total: 1
        // visible: 1

        // $this->response = Customer::class;

        return $this;
    }
}
