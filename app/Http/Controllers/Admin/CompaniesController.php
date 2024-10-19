<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
        
        ]);

        $company = new Company();
        $company->name = $validated['name'];
        $company->description = $validated['description'];
        $company->phone = $validated['phone'];
        $company->email = $validated['email'];
        $company->address = $validated['address'];
        $company->save();
        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
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

        $company = Company::findOrfail($id);
        return view('admin.companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'phone' => 'nullable|numeric',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
        
        ]);

        $company = Company::findOrfail($id);
        $company->name = $validated['name'];
        $company->description = $validated['description'];
        $company->phone = $validated['phone'];
        $company->email = $validated['email'];
        $company->address = $validated['address'];
        $company->save();
        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $company = Company::findOrfail($id);
        $company->delete();
        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
        
    }
}
