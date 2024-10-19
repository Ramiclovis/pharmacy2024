@extends('admin.layout')

@section('title', 'Purchases')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">
            <section>

                <h1 class="mb-4">Purchases</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="purchaseSearch" class="form-control" placeholder="Search purchases...">
                            </div>
                            
                            <div>
                                <a href="{{ route('admin.purchases.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> New Orders
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-auto border" style="height: 65vh">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Invoice Number</th>
                                        <th>Supplier Name</th>
                                        <th>Total Amount</th>
                                        <th>Grand Total</th>
                                        <th>Order Date & Time</th>
                                        <th>Actions</th>
                                        




                                        <th scope="col">#</th>
                                        <th scope="col">Invoice Number</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Grand Total</th>
                                        <th scope="col">Order Date & Time</th>
                                        <th scope="col">Actions</th>
                                       
                                    </tr>
                                </thead>

                                <tbody id="purchaseTable">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script>
        document.getElementById('purchaseSearch').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#purchaseTable tr');

            rows.forEach(function(row) {
                let purchaseName = row.cells[1].textContent.toLowerCase();
                if (purchaseName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

@endsection
