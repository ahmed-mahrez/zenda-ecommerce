<x-admin-layout title="Products">
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Products
                        <a href="{{route('admin.products.create')}}" class="btn btn-primary float-end">Add product</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category->name}}</td>
                                <td>{{$product->selling_price}}$</td>
                                <td>{{$product->quantity}}</td>
                                <td>{{ $product->status == 1 ? 'Visible' : 'hidden'}}</td>
                                <td>
                                    <a href="{{route('admin.products.edit', $product->id)}}" class="btn btn-success">Edit</a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</a>    
                                    @include('admin.products.delete-modal')       
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">no products yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>