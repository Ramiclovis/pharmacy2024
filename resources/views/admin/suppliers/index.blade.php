@extends('admin.layout')

@section('title', 'Suppliers')

@section('content')

    <x-sidebar />

    <div id="main">
        <div class="page-content">
            <section>
                <h1 class="mb-4">Suppliers</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="supplierSearch" class="form-control" placeholder="Search suppliers...">
                            </div>
                             
                            <div>
                                <a href="{{ route('admin.suppliers.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add New Supplier
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
                                        <th>Supplier Name</th>
                                        <th>phone</th>
                                        <th>Company Name</th>
                                        <th>notes</th>
                                        <th>Status</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="supplierTable">

                                    @foreach ($suppliers as $supplier)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $supplier->name }}</td>
                                            <td>{{ $supplier->phone }}</td>
                                            <td>{{ $supplier->company->name }}</td>
                                            <td>{{ $supplier->notes }}</td>
                                            <td>
                                                <button class="btn btn-sm {{ $supplier->status == 'active' ? 'btn-success' : 'btn-danger' }}" style="border-radius: 20px;">
                                                    {{ ucfirst($supplier->status) }}
                                                </button>
                                            </td>
                                            <td>{{ $supplier->created_at }}</td>
                                            <td>{{ $supplier->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.suppliers.edit', $supplier->id) }}" class="btn btn-primary btn-sm"><i>UPDATE</i></a>

                                                <form action="{{ route('admin.suppliers.destroy', $supplier->id) }}" method="POST" class="d-inline">
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
                            {{ $suppliers->onEachSide(1)->links('pagination::bootstrap-4') }} <!-- استخدام مكون الترقيم الخاص بـ Bootstrap -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JavaScript for search functionality -->
   
    <script>
         document.getElementById('supplierSearch').addEventListener('keyup', function () {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#supplierTable tr');

            rows.forEach(function (row) {
                let supplierName = row.cells[1].textContent.toLowerCase();
                if (supplierName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
