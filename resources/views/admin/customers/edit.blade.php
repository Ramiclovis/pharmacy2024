@extends('admin.layout')

@section('title', 'Edit Customer')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">

            <section>
                <h1 class="mb-4 text-center">Edit Customer</h1>
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.customers.update', $customer->id) }}" method="POST"
                        enctype="multipart/form-data" class="w-75">
                        @csrf
                        @method('PATCH')

                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('admin.customers.index') }}" class="btn btn-secondary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <!-- Customer Name input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="customer_name" class="form-label fw-bold">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name"
                                            value="{{ old('customer_name', $customer->customer_name) }}" required>
                                        @error('customer_name')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Customer Phone input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="customer_phone" class="form-label fw-bold">Customer Phone</label>
                                        <input type="text" class="form-control" id="customer_phone" name="customer_phone"
                                            value="{{ old('customer_phone', $customer->customer_phone) }}" required>
                                        @error('customer_phone')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Debt Amount input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="debt_amount" class="form-label fw-bold">Debt Amount</label>
                                        <input type="number" step="0.01" class="form-control" id="debt_amount" name="debt_amount"
                                            value="{{ old('debt_amount', $customer->debt_amount) }}" required>
                                        @error('debt_amount')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Debt Date input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="debt_date" class="form-label fw-bold">Debt Date</label>
                                        <input type="date" class="form-control" id="debt_date" name="debt_date"
                                            value="{{ old('debt_date', $customer->debt_date) }}" required>
                                        @error('debt_date')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Due Date input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="due_date" class="form-label fw-bold">Due Date</label>
                                        <input type="date" class="form-control" id="due_date" name="due_date"
                                            value="{{ old('due_date', $customer->due_date) }}" required>
                                        @error('due_date')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Paid Amount input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="paid_amount" class="form-label fw-bold">Paid Amount</label>
                                        <input type="number" step="0.01" class="form-control" id="paid_amount" name="paid_amount"
                                            value="{{ old('paid_amount', $customer->paid_amount) }}" required>
                                        @error('paid_amount')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Remaining Amount input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="remaining_amount" class="form-label fw-bold">Remaining Amount</label>
                                        <input type="number" step="0.01" class="form-control" id="remaining_amount" name="remaining_amount"
                                            value="{{ old('remaining_amount', $customer->remaining_amount) }}">
                                        @error('remaining_amount')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <!-- Payment Status input -->
                                    <div class="col-md-6 mb-4">
                                        <label for="payment_status" class="form-label fw-bold">Payment Status</label>
                                        <select id="payment_status" name="payment_status" class="form-control" required>
                                            <option value="Paid" {{ old('payment_status', $customer->payment_status) == 'Paid' ? 'selected' : '' }}>Paid</option>
                                            <option value="Unpaid" {{ old('payment_status', $customer->payment_status) == 'Unpaid' ? 'selected' : '' }}>Unpaid</option>
                                        </select>
                                        @error('payment_status')
                                            <div class="text-danger mt-2">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Note input -->
                                    <div class="col-md-12 mb-4">
                                        <label for="note" class="form-label fw-bold">Note</label>
                                        <textarea class="form-control" id="note" name="note">{{ old('note', $customer->note) }}</textarea>
                                        @error('note')
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
