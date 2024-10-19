@extends('admin.layout')

@section('title', 'Suppliers')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">

            <section>
                <h1 class="mb-4 text-center">Edit Supplier</h1>
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.suppliers.update', $supplier->id) }}" method="POST"
                        enctype="multipart/form-data" class="w-75">
                        @csrf
                        @method('PATCH') <!-- لجعل الطلب تحديث -->

                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Name input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $supplier->name) }}" required>
                                        @error('name')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="phone" class="form-label fw-bold">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $supplier->phone) }}" required>
                                        @error('phone')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6 mb-3">
                                        <label for="company_id" class="form-label">Company</label>
                                        <select class="form-control" id="company_id" name="company_id" required>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}"
                                                    {{ $supplier->company_id == $company->id ? 'selected' : '' }}>
                                                    {{ $company->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>





                                    <!-- Address input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="notes" class="form-label fw-bold">Notes</label>
                                        <input type="text" class="form-control" id="notes" name="notes"
                                            value="{{ old('notes', $supplier->notes) }}" required>
                                        @error('notes')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Description input -->
                                    <div class="col-md-12 mb-4">
                                        <label for="status" class="form-label">Status</label>
                                        <select class="form-select" id="status" name="status" required>
                                            <option value="active"
                                                {{ old('status', $supplier->status) == 'active' ? 'selected' : '' }}>Active
                                            </option>
                                            <option value="inactive"
                                                {{ old('status', $supplier->status) == 'inactive' ? 'selected' : '' }}>
                                                Inactive</option>
                                        </select>
                                        @error('status')
                                            <div class="text-danger">{{ $message }}</div>
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
