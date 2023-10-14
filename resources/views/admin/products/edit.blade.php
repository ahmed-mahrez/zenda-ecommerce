<x-admin-layout title="Edit product">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit product</h3>
                </div>
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seo-tags-tab" data-bs-toggle="tab" data-bs-target="#seo-tags" type="button" role="tab" aria-controls="seo-tags" aria-selected="false">SEO Tags</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details" type="button" role="tab" aria-controls="details" aria-selected="false">details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="images-tab" data-bs-toggle="tab" data-bs-target="#images" type="button" role="tab" aria-controls="images" aria-selected="false">Images</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="colors-tab" data-bs-toggle="tab" data-bs-target="#colors" type="button" role="tab" aria-controls="images" aria-selected="false">Colors</button>
                        </li>
                    </ul>
                    <form action="{{route('admin.products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="tab-content" id="myTabContent" style="margin:30px 0">
                            <!-- HOME TAB -->
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                                        <x-admin.input-error error="name" />
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label>Category</label>
                                        <select name="category_id">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}" @selected($category->id == $product->category_id)>{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-admin.input-error error="category_id" />
                                    </div>
                                    <div class="col-md-3 mb-4">
                                        <label>Brand</label>
                                        <select name="brand_id">
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @selected($brand->id == $product->brand_id)>{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                        <x-admin.input-error error="brand_id" />
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label>breif description</label>
                                        <textarea name="breif" class="form-control" rows="3">{{$product->breif}}</textarea>
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label>description</label>
                                        <textarea name="description" class="form-control" rows="3">{{$product->description}}</textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- SEO TAB -->
                            <div class="tab-pane fade" id="seo-tags" role="tabpanel" aria-labelledby="seo-tags-tab">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label>Meta title</label>
                                        <input type="text" name="meta_title" class="form-control" value="{{$product->meta_title}}">
                                        <x-admin.input-error error="meta_title" />
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label>Meta keyword</label>
                                        <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{$product->meta_keyword}}</textarea>
                                        <x-admin.input-error error="meta_keyword" />
                                    </div>
                                    <div class="col-md-12 mb-4">
                                        <label>Meta description</label>
                                        <textarea type="text" name="meta_description" class="form-control" rows="3">{{$product->meta_description}}</textarea>
                                        <x-admin.input-error error="meta_description" />
                                    </div>
                                </div>
                            </div>

                            <!-- Detials TAB -->
                            <div class="tab-pane fade" id="details" role="tabpanel" aria-labelledby="details-tab">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label>Original price</label>
                                        <input type="text" name="original_price" class="form-control" value="{{$product->original_price}}">
                                        <x-admin.input-error error="original_price" />
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label>Selling price</label>
                                        <input type="text" name="selling_price" class="form-control" value="{{$product->selling_price}}">
                                        <x-admin.input-error error="selling_price" />
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label>Quantity</label>
                                        <input type="text" name="quantity" class="form-control" value="{{$product->quantity}}">
                                        <x-admin.input-error error="quantity" />
                                    </div>

                                    <div class="col-md-2 mb-4">
                                        <label>Trending</label>
                                        <input type="checkbox" name="trending" @checked($product->trending)>
                                    </div>
                                    <div class="col-md-2 mb-4">
                                        <label>Status</label>
                                        <input type="checkbox" name="status" @checked($product->status)>
                                    </div>

                                </div>
                            </div>

                            <!-- IMAGES TAB -->
                            <div class="tab-pane fade" id="images" role="tabpanel" aria-labelledby="images-tab">
                                <div class="col-md-4 mb-4">
                                    <label>Images</label>
                                    <input type="file" name="images[]" multiple class="form-control">
                                </div>
                                <div class="col-md-12 mb-4">
                                    <h5>Product images:</h5>
                                    @livewire('admin.products.product-images', ['product_id' => $product->id])
                                </div>
                            </div>

                            <!-- COLORS TAB -->
                            <div class="tab-pane fade" id="colors" role="tabpanel" aria-labelledby="colors-tab">
                                @livewire('admin.products.product-colors', ['product_id' => $product_id])
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('js')
    <script>
        $('.updateQtyBtn').on('click', function(){
            let qty_id = 'updateQtyBtn-' + $(this).attr('value');
            let product_color_id = $(this).val();
            let qty = $(`#${qty_id}`).val();
            
            if(qty <= 0){
                alert('value muest be larger than 0');
            }
            else{
                $.ajax({
                    url: 'http://localhost:8000/admin/updateProductColor',
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_color_id : product_color_id,
                        quantity: qty
                    },
                    success: function(response){
                        alert(response);
                    }
                })
            }
        })

    </script>
    @endpush
</x-admin-layout>