@extends('admin.layout')

@section('title', 'Edit Product')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">

            <section>
                <h1 class="mb-4 text-center">Edit Product</h1>
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.products.update', $product->id) }}" method="POST"
                        enctype="multipart/form-data" class="w-75">
                        @csrf
                        @method('PATCH')

                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Product Name input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label fw-bold">Product Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $product->name) }}" required>
                                        @error('name')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Barcode input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="barcode" class="form-label fw-bold">Barcode</label>
                                        <input type="text" class="form-control" id="barcode" name="barcode"
                                            value="{{ old('barcode', $product->barcode) }}" required>
                                        @error('barcode')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Sell Price input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="sell_price" class="form-label fw-bold">Sell Price</label>
                                        <input type="number" step="0.01" class="form-control" id="sell_price" name="sell_price"
                                            value="{{ old('sell_price', $product->sell_price) }}" required>
                                        @error('sell_price')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Purchase Price input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="purchase_price" class="form-label fw-bold">Purchase Price</label>
                                        <input type="number" step="0.01" class="form-control" id="purchase_price" name="purchase_price"
                                            value="{{ old('purchase_price',  $product->purchase_price) }}" required>
                                        @error('purchase_price')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Quantity input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="quantity" class="form-label fw-bold">Quantity</label>
                                        <input type="number" class="form-control" id="quantity" name="quantity"
                                            value="{{ old('quantity', $product->quantity) }}" required>
                                        @error('quantity')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Status input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="status" class="form-label fw-bold">Status</label>
                                        <select id="status" name="status" class="form-control" required>
                                            <option value="active" {{ old('status', $product->status) == 'active' ? 'selected' : '' }}>Active</option>
                                            <option value="inactive" {{ old('status', $product->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Expiry Date input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="expiry_date" class="form-label fw-bold">Expiry Date</label>
                                        <input type="date" class="form-control" id="expiry_date" name="expiry_date"
                                            value="{{ old('expiry_date', $product->expiry_date) }}">
                                        @error('expiry_date')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Manufacturer input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="manufacturer" class="form-label fw-bold">Manufacturer</label>
                                        <input type="text" class="form-control" id="manufacturer" name="manufacturer"
                                            value="{{ old('manufacturer', $product->manufacturer) }}">
                                        @error('manufacturer')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Company input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="company_id" class="form-label fw-bold">Company</label>
                                        <select id="company_id" name="company_id" class="form-control" required>
                                            @foreach($companies as $company)
                                                <option value="{{ $company->id }}" {{ old('company_id', $product->company_id) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Supplier input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="supplier_id" class="form-label fw-bold">Supplier</label>
                                        <select id="supplier_id" name="supplier_id" class="form-control" required>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}" {{ old('supplier_id', $product->supplier_id) == $supplier->id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('supplier_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Category input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="category_id" class="form-label fw-bold">Category</label>
                                        <select id="category_id" name="category_id" class="form-control" required>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Description input -->
                                    <div class="col-md-12 mb-4">
                                        <label for="description" class="form-label fw-bold">Description</label>
                                        <textarea class="form-control" id="description" name="description">{{ old('description', $product->description) }}</textarea>
                                        @error('description')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
        
    </div>

@endsection
