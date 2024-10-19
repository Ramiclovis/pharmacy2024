@extends('admin.layout')

@section('title', 'Sales')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">
            <section>

                <h1 class="mb-4">Sales</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="saleSearch" class="form-control" placeholder="Search sales...">
                            </div>
                            
                            <div>
                                <a href="{{ route('admin.sales.create') }}" class="btn btn-primary">
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
                                        <th scope="col">#</th>
                                        <th scope="col">Invoice Number</th>
                                        <th scope="col">Total Amount</th>
                                        <th scope="col">Grand Total</th>
                                        <th scope="col">Order Date & Time</th>
                                        <th scope="col">Actions</th>
                                       
                                    </tr>
                                </thead>

                                <tbody id="saleTable">


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script>
        document.getElementById('saleSearch').addEventListener('keyup', function() {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#saleTable tr');

            rows.forEach(function(row) {
                let saleName = row.cells[1].textContent.toLowerCase();
                if (saleName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

@endsection
