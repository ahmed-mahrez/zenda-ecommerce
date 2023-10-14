<div class="main-navbar shadow-sm sticky-top">
    <div class="top-navbar">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 my-auto d-none d-sm-none d-md-block d-lg-block">
                <a href="/" style="text-decoration: none;"><h3 class="brand-name">{{ config('app.name') }}</h3></a>
                </div>
                <div class="col-md-5 my-auto">
                    <form method="GET" action="/search" role="search">
                        <div class="input-group">
                            <input type="search" name="search" value="{{ request('search') }}" placeholder="Search your product" class="form-control" />
                            <button class="btn bg-white" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <ul class="nav justify-content-end">

                        <li class="nav-item">
                            <a class="nav-link" href="/cart"><i class="fa fa-shopping-cart"></i> Cart @livewire('site.cart-count')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/wishlist"><i class="fa fa-heart"></i> Wishlist @livewire('site.wishlist-count')</a>
                        </li>
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('user.login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/profile"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a class="dropdown-item" href="/orders"><i class="fa fa-list"></i> My Orders</a></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fa fa-sign-out"></i> {{ __('Log Out') }}</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand d-block d-sm-block d-md-none d-lg-none" href="#">
                Funda Ecom
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/collections">All Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/new-arrivals">New Arrivals</a>
                    </li>
                    @foreach(\App\Models\Category::all() as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="/collections/{{$category->slug}}">{{ $category->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
</div>