@extends('admin.layout')

@section('title', 'Customers')

@section('content')

    <x-sidebar />

    <div id="main">
        <div class="page-content">
            <section>
                <h1 class="mb-4">Customers</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="customerSearch" class="form-control" placeholder="Search customers...">
                            </div>
                            <!-- Add new category button -->
                            <div>
                                <a href="{{ route('admin.customers.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add New Customer
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
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Debt Amount</th>
                                        <th>Debt Date</th>
                                        <th>Duc Date</th>
                                        <th>Paid Amount</th>
                                        <th>Remaining Amount</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="customerTable">

                                    @foreach ($customers as $customer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->customer_name }}</td>
                                            <td>{{ $customer->customer_phone }}</td>
                                            <td>{{ $customer->debt_amount }}</td>
                                            <td>{{ $customer->debt_date }}</td>
                                            <td>{{ $customer->due_date }}</td>
                                            <td>{{ $customer->paid_amount }}</td>
                                            <td>{{ $customer->remaining_amount }}</td>
                                            <td>{{ $customer->note }}</td>
                                            <td>
                                                <button class="btn btn-sm {{ $customer->payment_status == 'Paid' ? 'btn-success' : 'btn-danger' }}" style="border-radius: 20px;">
                                                    {{ ucfirst($customer->payment_status) }}
                                                </button>
                                            </td>
                                            
                                            <td>{{ $customer->created_at }}</td>
                                            <td>{{ $customer->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.customers.edit', $customer->id) }}" class="btn btn-primary btn-sm"><i>UPDATE</i></a>

                                                <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i>DELETE</i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination Links -->
                        <div class="mt-3">
                            <!-- عرض أرقام الصفحات بدل "Next" و "Previous" -->
                            {{ $customers->onEachSide(1)->links('pagination::bootstrap-4') }} <!-- استخدام مكون الترقيم الخاص بـ Bootstrap -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JavaScript for search functionality -->
   
    <script>
         document.getElementById('customerSearch').addEventListener('keyup', function () {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#customerTable tr');

            rows.forEach(function (row) {
                let customerName = row.cells[1].textContent.toLowerCase();
                if (customerName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
