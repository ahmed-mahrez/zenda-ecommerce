<x-site-layout title="HOME">
    <!-- Slider -->
    <x-admin.alert />
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
            <div class="carousel-item {{ !$key ? 'active' : '' }}">
                <img src="{{asset("storage/$slider->image")}}" class="d-block w-100" height="650px" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <div class="custom-carousel-content">
                        <h1>
                            {{$slider->title}}
                        </h1>
                        <p>
                            {{$slider->description}}
                        </p>
                        <div>
                            <a href="#" class="btn btn-slider">
                                Get Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h4>Welcome to {{config('app.name')}} Ecommerce</h4>
                    <div class="underline" style="margin: 10px auto"></div>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime sequi nesciunt ratione doloremque modi quia earum iusto repudiandae recusandae labore similique unde, placeat totam deleniti voluptates distinctio, et veritatis hic porro eaque ipsum delectus ea, inventore natus. Voluptate, incidunt modi?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Trending Products</h4>
                    <div class="underline"></div>
                </div>
                @if($trendingProducts->count())
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme owling">
                        @foreach($trendingProducts as $product)
                        <div class="item">
                            <div class="product-card" style="width: 300px">
                                <div class="product-card-img" style="height: 300px;">
                                    <label class="stock bg-success">Trending</label>
                                    <a href="{{asset("/collections/" . $product->category->slug . "/" . $product->slug)}}">
                                        <img src="{{ asset("storage/" . $product->images->first()->image) }}" alt="Laptop" style="height: 100%">
                                    </a>
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$product->brand->name}}</p>
                                    <h5 class="product-name">
                                        <a href="{{asset("/collections/" . $product->category->slug . "/" . $product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$product->selling_price}}</span>
                                        <span class="original-price">${{$product->original_price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals Products</h4>
                    <div class="underline"></div>
                </div>
                @if($newArrivals->count())
                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme owling">
                        @foreach($newArrivals as $product)
                        <div class="item">
                            <div class="product-card" style="width: 300px">
                                <div class="product-card-img" style="height: 300px;">
                                    <label class="stock bg-success">New</label>
                                    <a href="{{asset("/collections/" . $product->category->slug . "/" . $product->slug)}}">
                                        <img src="{{ asset("storage/" . $product->images->first()->image) }}" alt="Laptop" style="height: 100%">
                                    </a>
                                </div>
                                <div class="product-card-body">
                                    <p class="product-brand">{{$product->brand->name}}</p>
                                    <h5 class="product-name">
                                        <a href="{{asset("/collections/" . $product->category->slug . "/" . $product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$product->selling_price}}</span>
                                        <span class="original-price">${{$product->original_price}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach  
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>


@push('css')
    <link rel="stylesheet" href="{{asset('assets/site/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/site/css/owl.theme.default.min.css')}}">
@endpush

@push('js')
    <script src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script>
    <script>
        $('.owling').owlCarousel({
            margin:10,
            nav:false,
            dots: true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:3
                }
            }
        })
    </script>
@endpush

</x-site-layout>