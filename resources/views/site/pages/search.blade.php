<x-site-layout title="Search Products">
    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Search Results: </h4>
                    <div class="underline mb-5"></div>
                </div>
                @forelse($products as $product)
                <div class="col-md-10">
                    <div class="product-card">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="product-card-img" style="height: 200px;">
                                    <a href="{{asset("/collections/" . $product->category->slug . "/" . $product->slug)}}">
                                        <img src="{{ asset("storage/" . $product->images->first()->image) }}" alt="Laptop" style="height: 100%">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="product-card-body">
                                    <p class="product-brand">{{$product->brand->name}}</p>
                                    <h5 class="product-name">
                                        <a href="{{asset("/collections/" . $product->category->slug . "/" . $product->slug)}}">{{$product->name}}</a>
                                    </h5>
                                    <div>
                                        <span class="selling-price">${{$product->selling_price}}</span>
                                        <span class="original-price">${{$product->original_price}}</span>
                                    </div><Br><br>
                                    <p style="height: 45px; overflow:hidden">
                                        <b>Description: </b>{{ $product->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-md-12 p2" style="margin-bottom: 300px">
                    <h4>- No Products Available.</h4>
                </div>
                @endforelse
            
                <div class="col-md-6 text-center mt-5">
                    {{ $products->withQueryString()->links()  }}
                </div>
            </div>
        </div>
    </div>
</x-site-layout>