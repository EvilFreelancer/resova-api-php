<?php

namespace Resova;

use BadMethodCallException;
use ErrorException;
use GuzzleHttp\Exception\ClientException;
use Resova\Endpoints\Availability;
use Resova\Endpoints\Baskets;
use Resova\Endpoints\Customers;
use Resova\Endpoints\GiftVouchers;
use Resova\Endpoints\Items;
use Resova\Endpoints\Transactions;
use Resova\Endpoints\Webhooks;
use Resova\Interfaces\QueryInterface;

/**
 * @property \Resova\Interfaces\AvailabilityInterface $availability  Availability of time slots
 * @property Baskets                                  $baskets       Baskets management
 * @property Customers                                $customers     Customers management
 * @property GiftVouchers                             $gift_vouchers GiftVouchers management
 * @property Items                                    $items         For work with list of items
 * @property Transactions                             $transactions  Transactions management
 * @property Webhooks                                 $webhooks      Webhooks management
 *
 * @method Baskets      basket(int $basket_id)
 * @method Customers    customer(int $customer_id)
 * @method GiftVouchers gift_voucher(int $gift_voucher_id)
 * @method Items        item(int $item_id)
 * @method Transactions transaction(int $transaction_id)
 * @method Webhooks     webhook(int $webhook_id)
 *
 * Single entry point for all classes
 *
 * @package Resova
 */
class Client implements QueryInterface
{
    use HttpTrait;

    /**
     * @var string
     */
    protected $namespace = __NAMESPACE__ . '\\Endpoints';

    /**
     * Type of query
     *
     * @var string
     */
    protected $type;

    /**
     * Endpoint of query
     *
     * @var string
     */
    protected $endpoint;

    /**
     * Parameters of query
     *
     * @var mixed
     */
    protected $params;

    /**
     * @var array
     */
    protected static $variables = [];

    /**
     * API constructor.
     *
     * @param \Resova\Config $config
     * @param bool           $init
     *
     * @throws ErrorException
     */
    public function __construct(Config $config, bool $init = true)
    {
        // Save config into local variable
        $this->config = $config;

        // Init if need
        if ($init) {
            $this->client = $this->initClient($config->guzzle());
        }
    }

    /**
     * Get current client instance
     *
     * @return null|\GuzzleHttp\Client
     */
    public function getClient(): ?\GuzzleHttp\Client
    {
        return $this->client;
    }

    /**
     * Store the client object
     *
     * @param array $configs
     *
     * @return \GuzzleHttp\Client
     */
    public function initClient(array $configs = []): \GuzzleHttp\Client
    {
        return new \GuzzleHttp\Client($configs);
    }

    /**
     * Convert underscore_strings to camelCase (medial capitals).
     *
     * @param string $str
     *
     * @return string
     */
    private function snakeToPascal(string $str): string
    {
        // Remove underscores, capitalize words, squash, lowercase first.
        return str_replace(' ', '', ucwords(str_replace('_', ' ', $str)));
    }

    /**
     * Magic method required for call of another classes
     *
     * @param string $name
     *
     * @return bool|object
     * @throws BadMethodCallException
     */
    public function __get(string $name)
    {
        if (isset(self::$variables[$name])) {
            return self::$variables[$name];
        }

        // By default return is empty
        $object = '';

        // Set class name as namespace
        $class = $this->namespace . '\\' . $this->snakeToPascal($name);

        try {

            // Try to create object by name
            $object = new $class($this->config);

        } catch (ErrorException | ClientException $e) {
            echo $e->getMessage();
        }

        // If object is not created
        if (!is_object($object)) {
            throw new BadMethodCallException("Class $class could not to be loaded");
        }

        return $object;
    }

    /**
     * Magic method required for call of another classes
     *
     * @param string $name
     * @param array  $arguments
     *
     * @return bool|object
     * @throws BadMethodCallException
     */
    public function __call(string $name, array $arguments)
    {
        // By default return is empty
        $object = '';

        // Set class name as namespace
        $class = $this->namespace . '\\' . $this->snakeToPascal($name) . 's';

        try {

            // Try to create object by name
            $object = new $class($this->config);

        } catch (ErrorException | ClientException $e) {
            echo $e->getMessage();
        }

        // If object is not created
        if (!is_object($object)) {
            throw new BadMethodCallException("Class $class could not to be loaded");
        }

        return call_user_func_array($object, $arguments);
    }

    /**
     * Check if class is exist in folder
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset(self::$variables[$name]);
    }

    /**
     * Ordinary dummy setter, it should be ignored (added to PSR reasons)
     *
     * @param string $name
     * @param mixed  $value
     *
     * @throws BadMethodCallException
     */
    public function __set(string $name, $value)
    {
        self::$variables[$name] = $value;
    }
}
