<x-admin-layout title="Sliders">
    <x-admin.alert />
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Sliders
                        <a href="{{route('admin.sliders.create')}}" class="btn btn-primary float-end">Add slider</a>
                    </h3>
                </div>
                <div class="card-body">
                <table class="table table-bordered table striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sliders as $slider)
                            <tr>
                                <td>{{$slider->id}}</td>
                                <td>{{$slider->title}}</td>
                                <td>{{$slider->description}}</td>
                                <td> <img src="{{asset("storage/$slider->image")}}" style="width:50px; height:50px;border-radius:3px" alt="slider-img"> </td>
                                <td>{{ $slider->status == 1 ? 'Visible' : 'hidden'}}</td>
                                <td>
                                    <a href="{{route('admin.sliders.edit', $slider->id)}}" class="btn btn-success">Edit</a>
                                    <a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger">Delete</a>    
                                    @include('admin.sliders.delete-modal')       
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">no sliders yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>