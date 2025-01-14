<?php

namespace Tests\Feature\Repositories;

use App\Models\Customer;
use App\Repositories\CustomerRepository;
use Tests\TestCase;

class CustomerRepositoryTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    protected $tenancy = true;

    private CustomerRepository $customer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->customer = app(CustomerRepository::class);
    }

    public function test_get_Customer_by_id(): void
    {
        $customer = Customer::factory()->create();

        $this->assertEquals(Customer::class, get_class($this->customer->getCustomerById($customer->id)));
    }

    public function test_store_customer(): void
    {
        $customer = Customer::factory()->make();

        $this->customer->storeCustomer($customer->getData());

        $this->assertDatabaseHas((new Customer)->getTable(), [
            'name' => $customer->name,
            'email' => $customer->email,
            'phone' => $customer->phone,
            'company'=> $customer->company,
            'address'=> $customer->address,
            'city'=> $customer->city,
            'state'=> $customer->state,
            'country'=> $customer->country,

        ]);
    }

    public function test_update_customer(): void
    {
        $customer = Customer::factory()->create();

        $customer->phone = '1234567890';

        $this->customer->updateCustomer($customer->getData(), $customer);

        $this->assertDatabaseHas((new Customer)->getTable(), [
            'id' => $customer->id,
            'phone' => '1234567890',
        ]);
    }

    public function test_delete_Customer(): void
    {
        $customer = Customer::factory()->create();

        $this->customer->deleteCustomer($customer);

        $this->assertDatabaseMissing((new Customer)->getTable(), [
            'id' => $customer->id,
        ]);
    }
}