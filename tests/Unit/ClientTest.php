<?php

namespace Resova\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Exception;
use Resova\Client;
use Resova\Models\BasketRequest;
use Resova\Models\Customer;
use Resova\Models\Pricing;
use Resova\Models\Quantity;

class ClientTest extends TestCase
{

    public function test__construct(): void
    {
        try {
            $obj = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
            $this->assertIsObject($obj);
            $this->assertInstanceOf(Client::class, $obj);
        } catch (Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function test__construct2(): void
    {
        try {
            $obj = new Client(getenv('RESOVA_API_KEY'));
            $this->assertIsObject($obj);
            $this->assertInstanceOf(Client::class, $obj);
        } catch (Exception $e) {
            $this->assertContains('Must be initialized ', $e->getMessage());
        }
    }

    public function test__call(): void
    {
        $obj     = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $pricing = new Pricing([
            'quantities' => [
                new Quantity(['pricing_category_id' => 1, 'quantity' => 2]),
            ]
        ]);
        $this->assertInstanceOf(\Resova\Endpoints\Availability\Instances::class, $obj->availability->instance(123)->pricing($pricing));
        $this->assertInstanceOf(Endpoints\Availability\Instances::class, $obj->availability->instance(123));
        $this->assertInstanceOf(Endpoints\Availability\Instances::class, $obj->availability->instances);
        $this->assertInstanceOf(Endpoints\Availability\Calendars::class, $obj->availability->calendar(date('Y-m-d'), date('Y-m-d')));
    }

    public function testBasket(): void
    {
        $obj    = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $basket = new BasketRequest([
            'customer_id' => 123,
            'expires_at'  => '1558101934',
        ]);
        $this->assertInstanceOf(Endpoints\Baskets::class, $obj->basket(123)->create($basket));
        $this->assertInstanceOf(Endpoints\Baskets::class, $obj->baskets->create($basket));
    }

    public function testGift_voucher(): void
    {
        $obj = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $this->assertInstanceOf(Endpoints\GiftVouchers::class, $obj->gift_voucher(123));
        $this->assertInstanceOf(Endpoints\GiftVouchers::class, $obj->gift_vouchers);
    }

    public function test__get(): void
    {
        $obj = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $this->assertInstanceOf(Endpoints\Availability::class, $obj->availability);
    }

    public function test__set(): void
    {
        $obj = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $obj->availability->instance(3);
        $this->assertInstanceOf(Endpoints\Availability::class, $obj->availability);
    }

    public function test__isset(): void
    {
        $obj = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $obj->availability->instance(3);
        $this->assertFalse(isset($obj->dummy));
    }

    public function testItem(): void
    {
        $obj = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $this->assertInstanceOf(Endpoints\Items::class, $obj->item(1));
        $this->assertInstanceOf(Endpoints\Items::class, $obj->items);
        $this->assertInstanceOf(Endpoints\Items::class, $obj->item(1)->reviews());
        $this->assertInstanceOf(Endpoints\Items::class, $obj->item(1)->booking_questions());
        $this->assertInstanceOf(Endpoints\Items::class, $obj->item(1)->extras());
    }

    public function testCustomer(): void
    {
        $obj            = new Client(['api_key' => getenv('RESOVA_API_KEY')]);
        $customerCreate = new Customer([
            'first_name' => 'John',
            'last_name'  => 'Doe',
            'email'      => 'email@example.com'
        ]);
        $this->assertInstanceOf(Endpoints\Customers::class, $obj->customers->create($customerCreate));
        $this->assertInstanceOf(Endpoints\Customers::class, $obj->customer(123));
        $this->assertInstanceOf(Endpoints\Customers::class, $obj->customer(123)->update($customerCreate));
    }
}
