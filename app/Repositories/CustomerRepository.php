<?php

namespace App\Repository;

use App\Data\CustomerData;
use App\Models\Customer;

class CustomerRepository
{
    public function getCustomerById(int $id, $relations = []): Customer
    {
        return Customer::with($relations)->findOrFail($id);
    }

    public function storeCustomer(CustomerData $customerData): Customer
    {
        $customer = new Customer;
        $customer->fill($customerData->except('id')->toArray());
        $customer->save();

        return $customer;
    }

    public function updateCustomer(CustomerData $customerData, Customer $customer)
    {
        $customer->fill($customerData->except('id')->toArray());
        $customer->update();

        return $customer;
    }

    public function deleteCustomer(Customer $customer): bool
    {
        return $customer->delete();
    }
}
