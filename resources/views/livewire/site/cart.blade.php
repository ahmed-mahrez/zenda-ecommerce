<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <x-admin.alert />
            <h2>Shopping cart</h2>
            <hr>
            @if($cart->count())
                <div class="row">
                    <div class="col-md-12">
                        <div class="shopping-cart">
                            <div class="cart-header d-none d-sm-none d-mb-block d-lg-block">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h4>Product</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Color</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Price</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Quantity</h4>
                                    </div>
                                    <div class="col-md-1">
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-md-2">
                                        <h4>Remove</h4>
                                    </div>
                                </div>
                            </div>

                            @foreach($cart as $item)
                            <div class="cart-item">
                                <div class="row">
                                    <div class="col-md-3 my-auto">
                                        <a href="/collections/{{ $item->product->category->slug }}/{{ $item->product->slug }}">
                                            <label class="product-name">
                                                <img src="{{asset("storage/" . $item->product->firstImage()->image)}}" style="width: 50px; height: 50px" alt="">
                                                {{ $item->product->name }}
                                            </label>
                                        </a>
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        @if($item->color_id)
                                        <label class="price" style="color:{{ $item->color->color->code }}">{{ $item->color->color->name }} </label>
                                        @else
                                        <label class="price">_______</label>
                                        @endif
                                    </div>
                                    <div class="col-md-2 my-auto">
                                        <label class="price">${{ $item->product->selling_price }}</label>
                                    </div>
                                    <div class="col-md-2 col-7 my-auto">
                                        <div class="quantity">
                                            <div class="input-group">
                                                <span class="btn btn1" wire:click="decrement({{$item->id}}, {{$item->color->color->id ?? 0}})"><i class="fa fa-minus"></i></span>
                                                <input type="text" value="{{$item->quantity}}" class="input-quantity" readonly />
                                                <span class="btn btn1" wire:click="increment({{$item->id}}, {{$item->color->color->id ?? 0}})"><i class="fa fa-plus"></i></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1 my-auto">
                                        <label class="price">${{ $item->product->selling_price * $item->quantity }}</label>
                                        @php $totalPrice += $item->product->selling_price * $item->quantity  @endphp
                                    </div>
                                    <div class="col-md-2 col-5 my-auto">
                                        <div class="remove">
                                            <a wire:click="removeItem({{$item->id}})" class="btn btn-danger btn-sm">
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
                <div class="row">
                    <div class="col-md-8">
                        
                    </div>
                    <div class="col-md-4 mt-3">
                        <div class="shadow-sm bg-white p-3">
                            <h4>Total: <span class="float-end">${{ $totalPrice }}</span> </h4>
                            <hr>
                            <a href="/checkout" class="btn btn-warning w-100">Checkout</a>
                        </div>
                    </div>
                </div>
            @else
                <p style="margin-bottom: 400px;">- nothing here yet.</p>
            @endif


        </div>
    </div>
    @push('js')
    <script>
        $('#add').on('click', function() {
            let qty = $('#quantity');
            $('#quantity').val(parseInt(qty.val()) + 1);
            document.getElementById('quantity').dispatchEvent(new Event('input'));
        });

        $('#minus').on('click', function() {
            let qty = $('#quantity');
            if (qty.val() != 1) {
                $('#quantity').val(parseInt(qty.val()) - 1);
            }
            document.getElementById('quantity').dispatchEvent(new Event('input'));
        });
    </script>
    @endpush

</div>