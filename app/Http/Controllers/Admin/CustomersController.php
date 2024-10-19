<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::paginate(10);
        return view('admin.customers.index' , compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate incoming request data
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'debt_amount' => 'required|numeric',
            'debt_date' => 'required|date',
            'due_date' => 'required|date',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'nullable|numeric',
            'note' => 'nullable|string',
            'payment_status' => 'required|in:Paid,Unpaid',
        ]);
    
        // Create new customer instance
        $customer = new Customer();
        $customer->customer_name = $request->customer_name;
        $customer->customer_phone = $request->customer_phone;
        $customer->debt_amount = $request->debt_amount;
        $customer->debt_date = $request->debt_date;
        $customer->due_date = $request->due_date;
        $customer->paid_amount = $request->paid_amount;
        $customer->remaining_amount = $request->remaining_amount;
        $customer->note = $request->note;
        $customer->payment_status = $request->payment_status;
    
        // Save customer to the database
        $customer->save();
    
        // Redirect back with a success message
        return redirect()->route('admin.customers.index')->with('success', 'Customer created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
        $customer = Customer::findOrfail($id);
        return view('admin.customers.edit' , compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_phone' => 'required|string|max:255',
            'debt_amount' => 'required|numeric',
            'debt_date' => 'required|date',
            'due_date' => 'required|date',
            'paid_amount' => 'required|numeric',
            'remaining_amount' => 'nullable|numeric',
            'note' => 'nullable|string',
            'payment_status' => 'required|in:Paid,Unpaid',
        ]);
    
        $customer = Customer::findOrfail($id);
        $customer->customer_name = $validated['customer_name'];
        $customer->customer_phone = $validated['customer_phone'];
        $customer->debt_amount = $validated['debt_amount'];
        $customer->debt_date = $validated['debt_date'];
        $customer->due_date = $validated['due_date'];
        $customer->paid_amount = $validated['paid_amount'];
        $customer->remaining_amount = $validated['remaining_amount'];
        $customer->note = $validated['note'];
        $customer->payment_status = $validated['payment_status'];
        $customer->save();
        return redirect()->route('admin.customers.index')->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $customer = Customer::findOrfail($id);
        $customer->delete();
        return redirect()->route('admin.customers.index')->with('success', 'Customer deleted successfully.');
    
    }
}
