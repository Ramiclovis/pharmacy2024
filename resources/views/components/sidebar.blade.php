<div id="sidebar">
    <div class="sidebar-wrapper active">
        
        <div class="text-center position-relative">
            <a href="{{ url('/admin') }}"><img src="{{ asset('assets/compiled/images/logo.jpeg') }}" class="mt-4" width="130" alt="Logo"></a>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-item active">
                    <a href="{{ url('/admin') }}" class='sidebar-link'>
                        <i class="bi bi-house-door-fill"></i>
                        <span>Main Page</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.sales.index') }}" class='sidebar-link'>
                        <i class="bi bi-cart-fill"></i>
                        <span>Sales</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.purchases.index') }}" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>Purchases</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.companies.index') }}" class='sidebar-link'>
                        <i class="bi bi-building"></i>
                        <span>Companies</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.categories.index') }}" class='sidebar-link'>
                        <i class="bi bi-tags-fill"></i>
                        <span>Categories</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.products.index') }}" class='sidebar-link'>
                        <i class="bi bi-box-seam"></i>
                        <span>Products</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-wallet-fill"></i>
                        <span>Expenses</span>
                    </a>
                </li>  
                
                <li class="sidebar-item active">
                    <a href="{{ route('admin.suppliers.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-bounding-box"></i>
                        <span>Suppliers</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.customers.index') }}" class='sidebar-link'>
                        <i class="bi bi-person-lines-fill"></i>
                        <span>Customers</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-boxes"></i>
                        <span>Stock</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('admin.users.index') }}" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Users</span>
                    </a>
                </li>

                <li class="sidebar-item active">
                    <a href="{{ route('logout') }}" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Log Out</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>
