@extends('admin.layout')

@section('title', 'Categories')

@section('content')

    <x-sidebar />

    <div id="main">
        <div class="page-content">
            <section>
                <h1 class="mb-4">Categories</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="categorySearch" class="form-control" placeholder="Search categories...">
                            </div>
                            <!-- Add new category button -->
                            <div>
                                <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add New Category
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
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="categoryTable">
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->description }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm"><i>UPDATE</i></a>

                                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
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
                            {{ $categories->onEachSide(1)->links('pagination::bootstrap-4') }} <!-- استخدام مكون الترقيم الخاص بـ Bootstrap -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- JavaScript for search functionality -->
    <script>
        document.getElementById('categorySearch').addEventListener('keyup', function () {
            let input = this.value.toLowerCase();
            let rows = document.querySelectorAll('#categoryTable tr');

            rows.forEach(function (row) {
                let categoryName = row.cells[1].textContent.toLowerCase();
                if (categoryName.includes(input)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

@endsection
