<x-admin-layout title="Add slider">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Add slider
                        <a href="{{route('admin.sliders.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.sliders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 mb-4">
                                <label>title</label>
                                <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                <x-admin.input-error error="title" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Description</label>
                                <input type="text" name="description" class="form-control" value="{{old('description')}}">
                                <x-admin.input-error error="description" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Image</label>
                                <input type="file" name="image_file" class="form-control">
                                <x-admin.input-error error="image_file" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="status" @checked(old('status'))>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>