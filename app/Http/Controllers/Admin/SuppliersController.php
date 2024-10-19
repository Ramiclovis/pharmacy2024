<?php

namespace App\Http\Controllers\Admin;

use App\Models\Supplier;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate(10);
        $companies = Company::all();    
        return view('admin.suppliers.index' , compact('suppliers' , 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $suppliers = Supplier::all();
        $companies = Company::all();

        return view('admin.suppliers.create' , compact('suppliers' , 'companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ]);

        $supplier = new Supplier();
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->company_id = $request->company_id;
        $supplier->notes = $request->notes;
        $supplier->status = $request->status;
        $supplier->save();

        return redirect()->route('admin.suppliers.index');
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
        $supplier = Supplier::findOrfail($id);
        $companies = Company::all();
        return view('admin.suppliers.edit' , compact('supplier' , 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'company_id' => 'required',
            'notes' => 'required',
            'status' => 'required',
        ]);

        $supplier = Supplier::findOrfail($id);
        $supplier->name = $request->name;
        $supplier->phone = $request->phone;
        $supplier->company_id = $request->company_id;
        $supplier->notes = $request->notes;
        $supplier->status = $request->status;
        $supplier->save();

        return redirect()->route('admin.suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::findOrfail($id);
        $supplier->delete();
        return redirect()->route('admin.suppliers.index')->with('success', 'Supplier deleted successfully.');
    }
}
