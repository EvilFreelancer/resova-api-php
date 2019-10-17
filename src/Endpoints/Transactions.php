<?php

namespace Resova\Endpoints;

use Resova\Client;
use Resova\Interfaces\QueryInterface;
use Resova\Models\Transaction;
use Resova\Models\TransactionRequest;
use Resova\Models\TransactionUpdate;
use Resova\Models\Webhook;
use Resova\Models\WebhookDelete;
use Resova\Models\WebhookList;

class Transactions extends Client
{
    /**
     * @var string
     */
    protected $namespace = __CLASS__;

    /**
     * Create a transaction
     * Retrieves the details of a transaction. Provide the unique id for the transaction.
     *
     * @param TransactionRequest $transaction
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function create(TransactionRequest $transaction): QueryInterface
    {
        $transaction->setRequired([
            'basket_id',
            'payment',
        ]);

        // Set HTTP params
        $this->type     = 'post';
        $this->endpoint = '/transactions';
        $this->params   = $transaction;
        $this->response = Transaction::class;

        return $this;
    }

    /**
     * Retrieve a transaction
     * Retrieves the details of a transaction. Provide the unique id for the transaction.
     *
     * @param int $transaction_id The transaction id
     *
     * @return $this
     */
    public function __invoke(int $transaction_id): self
    {
        $this->transaction_id = $transaction_id;

        // Set HTTP params
        $this->type     = 'get';
        $this->endpoint = '/transactions/' . $transaction_id;
        $this->response = Transaction::class;

        return $this;
    }

    /**
     * Update a transaction
     * Updates the specified transaction by setting the values of the parameters passed.
     * Any parameters not provided will be left unchanged.
     * This request accepts mostly the same arguments as the transaction creation call.
     *
     * @param TransactionUpdate $transaction
     *
     * @return \Resova\Interfaces\QueryInterface
     */
    public function update(TransactionUpdate $transaction): QueryInterface
    {
        // Set HTTP params
        $this->type     = 'put';
        $this->endpoint = '/transactions/' . $this->transaction_id;
        $this->params   = $transaction;
        $this->response = Transaction::class;

        return $this;
    }
}
