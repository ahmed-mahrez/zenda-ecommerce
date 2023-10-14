<div>
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Brands
                        <a class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#addBrandModal">Add brand</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($brands as $brand)
                            <tr wire:key="{{$brand->id}}">
                                <td>{{$brand->id}}</td>
                                <td>{{$brand->name}}</td>
                                <td>{{ $brand->status == 1 ? 'Visible' : 'hidden'}}</td>
                                <td>
                                    <a href="#" class="btn btn-success" wire:click="editBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#updateBrandModal" >Edit</a>
                                    <a href="#" class="btn btn-danger" wire:click="deleteBrand({{$brand->id}})" data-bs-toggle="modal" data-bs-target="#deleteBrandModal">Delete</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">no brands yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @include('livewire.admin.brands.form-modal')

    @push('js')
        <script>
            window.addEventListener('close-modal', event => {
                $('#addBrandModal').modal('hide');
                $('#updateBrandModal').modal('hide');
                $('#deleteBrandModal').modal('hide');
            });
        </script>
    @endpush
</div>

