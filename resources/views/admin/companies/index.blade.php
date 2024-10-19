@extends('admin.layout')

@section('title', 'Companies')

@section('content')

    <x-sidebar />

    <div id="main">
        <div class="page-content">
            <section>
                <h1 class="mb-4">Companies</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="companySearch" class="form-control" placeholder="Search companies...">
                            </div>
                            <!-- Add new category button -->
                            <div>
                                <a href="{{ route('admin.companies.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add New Company
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
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>phone</th>
                                        <th>email</th>
                                        <th>address</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="companyTable">

                                    @foreach ($companies as $company)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->description }}</td>
                                            <td>{{ $company->phone }}</td>
                                            <td>{{ $company->email }}</td>
                                            <td>{{ $company->address }}</td>
                                            <td>{{ $company->created_at }}</td>
                                            <td>{{ $company->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.companies.edit', $company->id) }}" class="btn btn-primary btn-sm"><i>UPDATE</i></a>

                                                <form action="{{ route('admin.companies.destroy', $company->id) }}" method="POST" class="d-inline">
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
                            {{ $companies->onEachSide(1)->links('pagination::bootstrap-4') }} <!-- استخدام مكون الترقيم الخاص بـ Bootstrap -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JavaScript for search functionality -->
   
    <script>
         document.getElementById('companySearch').addEventListener('keyup', function () {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#companyTable tr');

            rows.forEach(function (row) {
                let companyName = row.cells[1].textContent.toLowerCase();
                if (companyName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
@endsection
