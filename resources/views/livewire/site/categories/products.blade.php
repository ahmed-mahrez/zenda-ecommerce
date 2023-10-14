<div>
<div class="row">
<div class="col-md-3">
        <div class="card">
            <div class="card-header">Brands</div>
            <div class="card-body">
                @foreach($brands as $brand)
                <label class="d-block">
                    <input type="checkbox" wire:click="brandFilter({{$brand->id}})" > {{$brand->name}}
                </label>
                @endforeach
            </div>
        </div>
        <div class="card mt-3">
            <div class="card-header">Price</div>
            <div class="card-body">   
                <label class="d-block">
                    <input type="radio" wire:model.live="price" value="low-to-high"> Low to High
                </label>
                <label class="d-block">
                    <input type="radio" wire:model.live="price" value="high-to-low"> High to Low
                </label>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="row">
            @forelse($products as $product)
            <div class="col-md-4">
                <div class="product-card">
                    <div class="product-card-img" style="height: 200px;">
                        @if($product->quantity > 0)
                        <label class="stock bg-success">In Stock</label>
                        @else
                        <label class="stock bg-success">Out of Stock</label>
                        @endif
                        <a href="{{asset("/collections/" . $category->slug . "/" . $product->slug)}}">
                            <img src="{{ asset("storage/" . $product->images->first()->image) }}" alt="Laptop" style="height: 100%">
                        </a>
                    </div>
                    <div class="product-card-body">
                        <p class="product-brand">{{$product->brand->name}}</p>
                        <h5 class="product-name">
                            <a href="{{asset("/collections/" . $category->slug . "/" . $product->slug)}}">{{$product->name}}</a>
                        </h5>
                        <div>
                            <span class="selling-price">${{$product->selling_price}}</span>
                            <span class="original-price">${{$product->original_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <p>- there is no products for this category.</p>
            @endforelse
        </div>
    </div>
</div>
</div>