@extends('admin.layout')

@section('title', 'R&M Pharmacy')

@section('content')

    <div id="app">

        <x-sidebar />

        <div id="main" class="vh-100 overflow-hidden">

            <div class="page-content">

                <div class="container">
                    <div class="row vh-100  align-items-center justify-content-center align-content-center">

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.sales.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-card-list text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Sales</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.purchases.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-bag-fill text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Purchases</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.companies.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-file-earmark-text-fill text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Companies</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.categories.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-tags text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Categories</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.products.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-box-seam text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Products</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ url('/admin/expenses') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-wallet text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Expenses</h5>
                                    </div>
                                </div>
                            </a>
                        </div>  

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.suppliers.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-truck text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Suppliers</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.customers.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-person-fill text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Customers</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ url('/admin/stock') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-box text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Stock</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <div class="col-md-3 mb-2">
                            <a href="{{ route('admin.users.index') }}" class="text-decoration-none text-dark">
                                <div class="card" style="background-color: #2a9d8f;">
                                    <div class="card-body text-center">
                                        <i class="bi bi-people text-white fs-1"></i>
                                        <h5 class="card-title mt-3 text-white">Users</h5>
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
