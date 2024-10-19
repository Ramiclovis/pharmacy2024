@extends('admin.layout')

@section('title', 'Purchase Order Detail')

@section('content')

<x-sidebar />

<div id="main">
   
    <section class="main h-100 p-4" style="background-color: #2a9d8f">
        <div class="container-fluid">

            <form action="{{ route('admin.sales.store') }}" method="POST" id="purchaseOrderForm">

                @csrf


                <div class="row border bg-white rounded shadow-sm m-4" style="height: 83vh;">
                    <div class="col-10 border-end h-100">
                        <div class="h-75 border-bottom overflow-auto">
                            <table class="table table-bordered table-hover text-center align-middle mt-2"
                                id="clickable_table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Sale Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="product-details">
                                    <!-- Product rows will be inserted here -->
                                </tbody>
                            </table>
                        </div>

                        <div class="h-25 bg-light">
                            <div class="row p-2 text-center h-100 align-items-center overflow-auto">
                                <div class="col-3">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control form-control-lg" id="total_amount"
                                            name="total_amount" value="0" readonly>
                                        <label for="total_amount">Total Amount</label>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-floating mb-1">
                                        <input type="number" class="form-control form-control-lg" id="discount_percentage"
                                            name="discount_percentage" value="0">
                                        <label for="discount_percentage">Discount (%)</label>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control form-control-lg" id="discount_value"
                                            name="discount_value" value="0" readonly>
                                        <label for="discount_value">Discount Amount</label>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control form-control-lg" id="total_after_discount"
                                            name="total_after_discount" value="0" readonly>
                                        <label for="total_after_discount">Total After Discount</label>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="form-floating mb-1">
                                        <input type="text" class="form-control form-control-lg text-danger"
                                            id="grand_total" name="grand_total" value="0" readonly>
                                        <label for="grand_total">Grand Total</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-2 border-start" style="background-color: #2a9d8f">
                        <div class="form-floating mb-1 mt-3 fw-bolder">
                            <input type="text" class="form-control" id="barcode" value="">
                            <label for="barcode">Barcode</label>
                        </div>

                        <div class="form-floating mb-1">
                            <input type="text" class="form-control" id="invoice_number" name="invoice_number"
                                value="" readonly>
                            <label for="invoice_number" class="fw-bold">Invoice Number</label>
                        </div>


                        <div class="form-floating mb-1 fw-bolder">
                            <input type="text" class="form-control" id="order_notes" name="order_notes" value="">
                            <label for="order_notes">Order Notes</label>
                        </div>

                        <div class="form-floating mb-1 fw-bolder">
                            <div class="form-floating mb-1">
                                <input type="text" class="form-control" id="created_at" name="created_at" value=""
                                    readonly>
                                <label for="created_at">Invoice Date</label>
                            </div>
                        </div>

                        <div class="d-grid gap-1">
                            
                            <button type="submit" class="btn btn-sm btn-success"><i
                                    class="bi bi-check-all float-start pe-2"></i>Save</button>
                            <button type="button" class="btn btn-info"><i
                                    class="bi bi-printer float-start pe-2"></i>Print Invoice</button>
                            <button type="button" class="btn btn-secondary"><i
                                    class="bi bi-wallet2 float-start pe-2"></i>Post Invoice</button>
                            <button type="button" class="btn btn-danger"><i
                                    class="bi bi-trash float-start pe-2"></i>Delete Invoice</button>
                            <button type="button" onclick="window.history.back(-1);" class="btn btn-dark"><i
                                    class="bi bi-reply float-start pe-2"></i>Back</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
</div>


@endsection
