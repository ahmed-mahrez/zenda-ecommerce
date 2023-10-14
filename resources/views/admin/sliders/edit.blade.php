<x-admin-layout title="Edit slider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Edit slider
                        <a href="{{route('admin.sliders.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sliders.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label>title</label>
                                <input type="text" name="title" class="form-control" value="{{$slider->title}}">
                                <x-admin.input-error error="title" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{$slider->description}}">
                                <x-admin.input-error error="description" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Image</label>
                                <input type="file" name="image_file" class="form-control">
                                <x-admin.input-error error="image_file" />
                            </div>
                            <label>Current Image:</label>
                            <div class="col-md-12 mb-4">
                                @if($slider->image)
                                    <img src="{{asset('storage/' . $slider->image)}}" style="width:300px; height:150px;border-radius:3px" alt="">
                                @else
                                    <p>- there is no image for this slider.</p>
                                @endif                         
                            </div>
                            <br><br>
                            <div class="col-md-4 mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="status" @checked($slider->status)>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>