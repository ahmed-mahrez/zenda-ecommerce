<x-admin-layout title="Dashboard">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="me-md-3 me-xl-5">
                <h2>Dashboard,</h2>
                <p class="mb-md-0">Your analytics dashboard template.</p>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label class="mb-2">Total Orders</label>
                        <h4>{{ $ordersCount }}</h4>
                        <a href="{{route('admin.orders.index')}}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3">
                        <label class="mb-2">Today Orders</label>
                        <h4>{{ $todayOrdersCount }}</h4>
                        <a href="{{route('admin.orders.index')}}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label class="mb-2">This Month Orders</label>
                        <h4>{{ $monthOrdersCount }}</h4>
                        <a href="{{route('admin.orders.index')}}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-danger text-white mb-3">
                        <label class="mb-2">This year Orders</label>
                        <h4>{{ $yearOrdersCount }}</h4>
                        <a href="{{route('admin.orders.index')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label class="mb-2">Total Products</label>
                        <h4>{{ $productsCount }}</h4>
                        <a href="{{route('admin.products.index')}}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-secondary text-white mb-3">
                        <label class="mb-2">Total Categories</label>
                        <h4>{{ $categoriesCount }}</h4>
                        <a href="{{route('admin.categories.index')}}" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label class="mb-2">Total Brands</label>
                        <h4>{{ $brandsCount }}</h4>
                        <a href="{{route('admin.brands.index')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body bg-primary text-white mb-3">
                        <label class="mb-2">Total Admins</label>
                        <h4>{{ $adminsCount }}</h4>
                        <a href="#" class="text-white">View</a>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-body bg-success text-white mb-3">
                        <label class="mb-2">Total users</label>
                        <h4>{{ $usersCount }}</h4>
                        <a href="{{route('admin.users.index')}}" class="text-white">View</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>