@extends('admin.layout')

@section('title', 'Companies')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">

            <section>
                <h1 class="mb-4 text-center">Edit Companies</h1>
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.companies.update', $company->id) }}" method="POST"
                        enctype="multipart/form-data" class="w-75">
                        @csrf
                        @method('PATCH') <!-- لجعل الطلب تحديث -->

                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.companies.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Name input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="name" class="form-label fw-bold">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ old('name', $company->name) }}" required>
                                        @error('name')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Phone input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="phone" class="form-label fw-bold">Phone</label>
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            value="{{ old('phone', $company->phone) }}" required>
                                        @error('phone')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Email input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="email" class="form-label fw-bold">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $company->email) }}" required>
                                        @error('email')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Address input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="address" class="form-label fw-bold">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ old('address', $company->address) }}" required>
                                        @error('address')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Description input -->
                                    <div class="col-md-12 mb-4">
                                        <label for="description" class="form-label fw-bold">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                            value="{{ old('description', $company->description) }}">
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
