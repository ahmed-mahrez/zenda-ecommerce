<div>
    <div class="py-3 py-md-5 bg-light">
        <div class="container">
            <x-admin.alert />
            <div class="row" style="height:350px">
                <div class="col-md-4 mt-3" style="height:100%">
                    <div class="bg-white border" style="height:100%" >
                        <img src="{{asset('storage/' . $product->firstImage()->image)}}" style="width: 100%; height: 100%; border-radius:3px">
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">${{ $product->selling_price }}</span>
                            <span class="original-price">${{ $product->original_price }}</span>
                        </div>
                        <div>
                            @if($product->quantity && $product->colors && $product->colors->sum('quantity') > 0)
                                @foreach($product->colors as $color)
                                    @if($color->quantity)
                                        <input type="radio" wire:model.live="selected_color_id" value="{{$color->id}}"> {{$color->color->name}}
                                    @endif
                                @endforeach
                            @else
                                @if($product->quantity)
                                    <label class="btn btn-sm py-1 mt-2 text-white bg-success">In Stock</label>
                                @else
                                    <label class="btn btn-sm py-1 mt-2 text-white bg-danger">Out of Stock</label>
                                @endif
                            @endif
                        </div>
                        
                        <div class="mt-2">
                            <div class="input-group">
                                <b>Quantity</b>: &nbsp
                                <select name="quantity" wire:model.live="quantity" style="padding: 2px">
                                    @for($i = 1; $i <= 10; $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="mt-2">
                            @if($product->quantity)
                            <button wire:click="addToCart" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</button>
                            @endif
                            <button wire:click="addToWishlist" class="btn btn1">
                                <span wire:loading.remove wire:target="addToWishlist"><i class="fa fa-heart"></i>Add To Wishlist</span>
                                <span wire:loading wire:target="addToWishlist">Adding...</span>
                            </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Breif Description</h5>
                            <p>
                                {{ $product->breif }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <Br><br>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                                {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>