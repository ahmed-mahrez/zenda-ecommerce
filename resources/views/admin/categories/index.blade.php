<x-admin-layout title="Categories">
    <div class="row">
        <div class="col-md-12">
           <x-admin.alert />
            <div class="card">
                <div class="card-header">
                    <h3>Categories
                        <a href="{{route('admin.categories.create')}}" class="btn btn-primary float-end">Add Category</a>
                    </h3>
                </div>
                <div class="card-body">
                @livewire('admin.categories.categories-list')
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>