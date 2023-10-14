<x-site-layout title="New Arrivals">
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>New Arrivals</h4>
                    <div class="underline mb-5"></div>
                </div>
                @forelse($newArrivals as $product)
                <div class="col-md-3">
                    <div class="product-card" >
                        <div class="product-card-img" style="height: 300px;">
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
                @empty
                <div class="col-md-12 p2">
                    <h4>- No Products Available.</h4>
                </div>
                @endforelse

                <div class="text-center">
                    <a href="/collections" class="btn btn-warning px-3">View More</a>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>