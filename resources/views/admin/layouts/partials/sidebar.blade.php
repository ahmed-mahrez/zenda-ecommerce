<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.orders.index')}}">
                <i class="mdi mdi-database-import menu-icon"></i>
                <span class="menu-title">Orders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.categories.index')}}">
                <i class="mdi mdi-toolbox menu-icon"></i>
                <span class="menu-title">Categories</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.products.index')}}">
                <i class="mdi mdi-menu menu-icon"></i>
                <span class="menu-title">Products</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.brands.index')}}">
                <i class="mdi mdi-watermark menu-icon"></i>
                <span class="menu-title">Brands</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.colors.index')}}">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Colors</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.users.index')}}">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.sliders.index')}}">
                <i class="mdi mdi-play-box-outline menu-icon"></i>
                <span class="menu-title">Home Sliders</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.settings.index')}}">
                <i class="mdi mdi-settings menu-icon"></i>
                <span class="menu-title">Site Settings</span>
            </a>
        </li>
    </ul>
</nav>