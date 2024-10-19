@extends('admin.layout')

@section('title', 'Products')

@section('content')

    <x-sidebar />

    <div id="main">

        <div class="page-content">
            <section>

                <h1 class="mb-4">Products</h1>
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div class="d-flex justify-content-end w-100">
                            <!-- Search input -->
                            <div class="me-2">
                                <input type="text" id="productSearch" class="form-control" placeholder="Search products...">
                            </div>
                            <!-- Add new category button -->
                            <div>
                                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                                    <i class="bi bi-plus-circle"></i> Add New Products
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive overflow-auto border" style="height: 65vh">
                            <table class="table table-hover table-bordered">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th> <!-- Auto-incrementing ID -->
                                        <th>باركود</th> <!-- Product barcode -->
                                        <th>اسم الدواء</th> <!-- Product name -->
                                        <th>اسم العلمي</th> <!-- Scientific name -->
                                        <th>اسم الشركه</th> <!-- Manufacturer name -->
                                        <th>التصنيف</th> <!-- Category name -->
                                        <th>التصنيفات</th> <!-- Company name -->
                                        <th>الوصف</th> <!-- Description -->
                                        <th>سعر شراء الباكيت</th> <!-- Pack purchase price -->
                                        <th>سعر بيع الباكيت</th> <!-- Pack selling price -->
                                        <th>سعر شراء الشريط</th> <!-- Strip purchase price -->
                                        <th>سعر بيع الشريط</th> <!-- Strip selling price -->
                                        <th>كمية الشريط</th> <!-- Strip quantity -->
                                        <th>كمية الباكيت</th> <!-- Pack quantity -->
                                        <th>اسم الوحدة الثانية</th> <!-- Second unit name -->
                                        <th>التعبئه</th> <!-- Packing info -->
                                        <th>الحاله</th> <!-- Status -->
                                        <th>الإجراءات</th> <!-- Actions for editing, deleting, etc. -->
                                    </tr>
                                </thead>
                                
                                
                                <tbody id="productTable">
                                    @foreach ($products as $product)
                                        <tr>
                                            <td>{{ $product->id }}</td> 
                                            <td>{{ $product->barcode }}</td> <!-- باركود المنتج -->
                                            <td>{{ $product->name }}</td> <!-- اسم الدواء -->
                                            <td>{{ $product->scientific_name }}</td> <!-- الاسم العلمي -->
                                            <td>{{ $product->manufacturer }}</td> <!-- اسم الشركة -->
                                            <td>{{ optional($product->category)->name }}</td> <!-- التصنيف -->
                                            <td>{{ optional($product->company)->name }}</td> <!-- التصنيفات -->
                                            <td>{{ $product->description }}</td> <!-- الوصف -->
                                            <td>{{ $product->pack_purchase_price }}</td> <!-- سعر شراء الباكيت -->
                                            <td>{{ $product->pack_sell_price }}</td> <!-- سعر بيع الباكيت -->
                                            <td>{{ $product->strip_purchase_price }}</td> <!-- سعر شراء الشريط -->
                                            <td>{{ $product->strip_sell_price }}</td> <!-- سعر بيع الشريط -->
                                            <td>{{ $product->strip_quantity }}</td> <!-- كمية الشريط -->
                                            <td>{{ $product->pack_quantity }}</td> <!-- كمية الباكيت -->
                                            <td>{{ $product->second_unit_name }}</td> <!-- اسم الوحدة الثانية -->
                                            <td>{{ $product->packing_info }}</td> <!-- التعبئة -->
                                            <td>{{ $product->status }}</td> <!-- الحالة -->
                                            <td>
                                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary btn-sm"><i>UPDATE</i></a>

                                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline">
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
                    </div>
                </div>
            </section>
        </div>
    </div>



    <script>
        document.getElementById('productSearch').addEventListener('keyup', function () {
           let input = this.value.toLowerCase();
           let rows = document.querySelectorAll('#productTable tr');

           rows.forEach(function (row) {
               let productName = row.cells[1].textContent.toLowerCase();
               if (productName.includes(input)) {
                   row.style.display = '';
               } else {
                   row.style.display = 'none';
               }
           });
       });
   </script>

@endsection
