<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Company;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(10);
        $companies = Company::all();
        
        $categories = Category::all();
        return view('admin.products.index' , compact('products' , 'companies'  , 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        $companies = Company::all();
        
        $categories = Category::all();
        return view('admin.products.create' , compact('products' , 'companies' ,  'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'scientific_name' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'barcode' => 'required|string|unique:products,barcode',
            'expiry_date' => 'nullable|date',
            'manufacturer' => 'nullable|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'category_id' => 'required|exists:categories,id',
            'pack_purchase_price' => 'nullable|numeric',
            'pack_sell_price' => 'nullable|numeric',
            'strip_purchase_price' => 'nullable|numeric',
            'strip_sell_price' => 'nullable|numeric',
            'strip_quantity' => 'nullable|integer',
            'pack_quantity' => 'nullable|integer',
            'second_unit_name' => 'nullable|string|max:255',
            'packing_info' => 'nullable|string|max:255',
            'status' => 'nullable|string|in:active,inactive'
        ]);
    
        // Store the validated data into the products table
        $product = new Product();
        $product->name = $request->name;
        $product->scientific_name = $request->scientific_name;
        $product->description = $request->description;
        $product->barcode = $request->barcode;
        $product->expiry_date = $request->expiry_date;
        $product->manufacturer = $request->manufacturer;
        $product->company_id = $request->company_id;
        $product->category_id = $request->category_id;
        $product->pack_purchase_price = $request->pack_purchase_price;
        $product->pack_sell_price = $request->pack_sell_price;
        $product->strip_purchase_price = $request->strip_purchase_price;
        $product->strip_sell_price = $request->strip_sell_price;
        $product->strip_quantity = $request->strip_quantity;
        $product->pack_quantity = $request->pack_quantity;
        $product->second_unit_name = $request->second_unit_name;
        $product->packing_info = $request->packing_info;
        $product->status = $request->status ?? 'active';
    
        // Save the product to the database
        $product->save();
    
        // Redirect or return response
        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
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
        
        $product = Product::find($id);  
        $companies = Company::all();
        $suppliers = Supplier::all();
        $categories = Category::all();
        return view('admin.products.edit' , compact('product' , 'companies' , 'suppliers' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }
}
