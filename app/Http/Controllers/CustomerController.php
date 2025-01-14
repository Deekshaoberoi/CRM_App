<?php

namespace App\Http\Controllers;

use App\Data\CustomerData;
use App\Repositories\CustomerRepository;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function __construct(private CustomerRepository $customerRepository) {}

    public function index()
    {
        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(CustomerData $request)
    {
        $this->customerRepository->storeCustomer($request->validated());

        return Redirect::route('customers.index');
    }

    public function update(CustomerData $request, int $id)
    {
        $this->customerRepository->updateCustomer($request->validated(),
            $this->customerRepository->getCustomerById($id));

        return Redirect::route('customers.index');
    }
}
