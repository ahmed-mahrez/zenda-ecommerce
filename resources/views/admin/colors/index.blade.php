<x-admin-layout title="Colors">
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Colors
                        <a href="{{route('admin.colors.create')}}" class="btn btn-primary float-end">Add color</a>
                    </h3>
                </div>
                <div class="card-body">
                <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($colors as $color)
                            <tr>
                                <td>{{$color->id}}</td>
                                <td>{{$color->name}}</td>
                                <td>{{$color->code}}</td>
                                <td>{{ $color->status == 1 ? 'Visible' : 'hidden'}}</td>
                                <td>
                                    <a href="{{route('admin.colors.edit', $color->id)}}" class="btn btn-success">Edit</a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</a>    
                                    @include('admin.colors.delete-modal')       
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">no colors yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>