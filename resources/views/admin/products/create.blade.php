@extends('admin.layout')

@section('title', 'Products')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">

            <div class="row align-items-center justify-content-center">
                <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="{{ route('admin.products.index') }}" class="btn btn-primary">Back</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="scientific_name" class="form-label">Scientific Name</label>
                                    <input type="text" class="form-control" id="scientific_name" name="scientific_name">
                                    @error('scientific_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="barcode" class="form-label">Barcode</label>
                                    <input type="text" class="form-control" id="barcode" name="barcode" required>
                                    @error('barcode')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="expiry_date" class="form-label">Expiry Date</label>
                                    <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
                                    @error('expiry_date')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="manufacturer" class="form-label">Manufacturer</label>
                                    <input type="text" class="form-control" id="manufacturer" name="manufacturer" required>
                                    @error('manufacturer')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="company_id" class="form-label">Company</label>
                                    <select class="form-select" id="company_id" name="company_id" required>
                                        <option value="">Select Company</option>
                                        @foreach ($companies as $company)
                                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                                        @endforeach    
                                    </select>
                                    @error('company_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select" id="category_id" name="category_id" required>
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach    
                                    </select>
                                    @error('category_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="sell_price" class="form-label">Sell Price</label>
                                    <input type="number" step="0.01" class="form-control" id="sell_price" name="sell_price" required>
                                    @error('sell_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="purchase_price" class="form-label">Purchase Price</label>
                                    <input type="number" step="0.01" class="form-control" id="purchase_price" name="purchase_price" required>
                                    @error('purchase_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                               

                                <div class="col-md-4 mb-3">
                                    <label for="strip_quantity" class="form-label">Strip Quantity</label>
                                    <input type="number" class="form-control" id="strip_quantity" name="strip_quantity">
                                    @error('strip_quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="pack_quantity" class="form-label">Pack Quantity</label>
                                    <input type="number" class="form-control" id="pack_quantity" name="pack_quantity">
                                    @error('pack_quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="pack_sell_price" class="form-label">Pack Sell Price</label>
                                    <input type="number" step="0.01" class="form-control" id="pack_sell_price" name="pack_sell_price">
                                    @error('pack_sell_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="pack_purchase_price" class="form-label">Pack Purchase Price</label>
                                    <input type="number" step="0.01" class="form-control" id="pack_purchase_price" name="pack_purchase_price">
                                    @error('pack_purchase_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="strip_sell_price" class="form-label">Strip Sell Price</label>
                                    <input type="number" step="0.01" class="form-control" id="strip_sell_price" name="strip_sell_price">
                                    @error('strip_sell_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="strip_purchase_price" class="form-label">Strip Purchase Price</label>
                                    <input type="number" step="0.01" class="form-control" id="strip_purchase_price" name="strip_purchase_price">
                                    @error('strip_purchase_price')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="second_unit_name" class="form-label">Second Unit Name</label>
                                    <select class="form-control" id="second_unit_name" name="second_unit_name">
                                        <option value="شريط">شريط</option>
                                        <option value="باكيت">باكيت</option>
                                    </select>
                                    @error('second_unit_name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                

                                <div class="col-md-4 mb-3">
                                    <label for="packing_info" class="form-label">Packing Info</label>
                                    <input type="text" class="form-control" id="packing_info" name="packing_info">
                                    @error('packing_info')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="quantity" class="form-label">Quantity</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity" required>
                                    @error('quantity')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            
                                <div class="col-md-6 mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="">Select Status</option>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description" required>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // Your existing JavaScript functions can stay here...
        // Just make sure to update IDs if they were used in the new form.
    </script>

@endsection
