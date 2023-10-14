<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <h2>Wishlist</h2>
            <hr>
            @if($wishlist->count())
            <div class="row">
                <div class="col-md-12">
                    <div class="shopping-cart">
                        <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                            <div class="row">
                                <div class="col-md-5">
                                    <h4>Product</h4>
                                </div>
                                <div class="col-md-2">
                                    <h4>Price</h4>
                                </div>
                                <div class="col-md-2">
                                    
                                </div>
                            </div>
                        </div>
    
                        @foreach($wishlist as $item)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-5 my-auto">
                                        <a href="/collections/{{ $item->product->category->slug }}/{{ $item->product->slug }}">
                                            <label class="product-name">
                                                <img src="{{ asset("storage/" . $item->product->images->first()->image) }}" style="width: 50px; height: 50px;border-radius:3px;" alt="">
                                                {{ $item->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{ $item->product->selling_price }} </label>
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a wire:click="removeItem({{$item->product_id}})" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i> Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            @else
                <p>- no items in wishlist.</p>
            @endif

        </div>
    </div>
</div>