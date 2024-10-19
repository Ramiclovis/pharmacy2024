@extends('admin.layout')

@section('title', 'Create Customer')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">
            <section>
                <div class="row align-items-center justify-content-center">
                    <form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <a href="{{ route('admin.customers.index') }}" class="btn btn-primary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="customer_name" class="form-label">Customer Name</label>
                                        <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                                        @error('customer_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="customer_phone" class="form-label">Customer Phone</label>
                                        <input type="text" class="form-control" id="customer_phone" name="customer_phone" required>
                                        @error('customer_phone')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="debt_amount" class="form-label">Debt Amount</label>
                                        <input type="number" class="form-control" id="debt_amount" name="debt_amount" step="0.01" required>
                                        @error('debt_amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="debt_date" class="form-label">Debt Date</label>
                                        <input type="date" class="form-control" id="debt_date" name="debt_date" required>
                                        @error('debt_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="due_date" class="form-label">Due Date</label>
                                        <input type="date" class="form-control" id="due_date" name="due_date" required>
                                        @error('due_date')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="paid_amount" class="form-label">Paid Amount</label>
                                        <input type="number" class="form-control" id="paid_amount" name="paid_amount" step="0.01" required>
                                        @error('paid_amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="remaining_amount" class="form-label">Remaining Amount</label>
                                        <input type="number" class="form-control" id="remaining_amount" name="remaining_amount" step="0.01">
                                        @error('remaining_amount')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="payment_status" class="form-label">Payment Status</label>
                                        <select class="form-control" id="payment_status" name="payment_status" required>
                                            <option value="Paid">Paid</option>
                                            <option value="Unpaid">Unpaid</option>
                                        </select>
                                        @error('payment_status')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="note" class="form-label">Note</label>
                                    <textarea class="form-control" id="note" name="note" rows="3"></textarea>
                                    @error('note')
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
