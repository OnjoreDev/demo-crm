<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $customers = auth()->user()
        ->customers()
        ->withCount('interactions')
        ->latest()
        ->paginate(10);

    return view('customers.index', compact('customers'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
        //
        Customer::create(array_merge(
            $request->validated(),
            ['user_id'=>auth()->id()])
            );

        return redirect()->route('customers.index')->with('success','Customer created successfully.');    
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //confirm customer is logged in
        $this->authorizeCustomer($customer);

        $customer->load('interactions');

        return view('customers.show',compact('customer'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
        $this->authorizeCustomer($customer);
        return view('customers.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
        $this->authorizeCustomer($customer);
        $customer->update($request->validated());
        return redirect()->route('customers.index')->with('success','Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $this->authorizeCustomer($customer);
        $customer->delete();
        return back()->with('success','Customer deleted successfully');
    }

    private function authorizeCustomer(Customer $customer){
        if($customer->user_id !== auth()->id()){
            abort(403,'Unauthorized action');
        }
    }
}
