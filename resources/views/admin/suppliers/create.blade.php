@extends('admin.layout')

@section('title', 'Create Company')

@section('content')

    <x-sidebar />

    <div id="main">
        <div class="page-content">
            <section>
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.suppliers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.suppliers.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="name" class="form-label">Supplier Name</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="phone" class="form-label">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone" required>
                                        @error('phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="company_id" class="form-label">Company Name</label>
                                        <select class="form-control" id="company_id" name="company_id" required>
                                            <option value="" disabled selected>Select a Company</option>
                                            @foreach ($companies as $company)
                                                <option value="{{ $company->id }}">{{ $company->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('company_id')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="notes" class="form-label">Notes</label>
                                        <input type="text" class="form-control" id="notes" name="notes" required>
                                        @error('notes')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="">Select a status</option>
                                        @foreach (['active' => 'Active', 'inactive' => 'Inactive'] as $value => $label)
                                            <option value="{{ $value }}">{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

@endsection
