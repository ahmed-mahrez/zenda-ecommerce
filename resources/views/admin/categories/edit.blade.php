<x-admin-layout title="Edit category">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Categories
                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.categories.update', $category->id)}}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{$category->name}}">
                                <x-admin.input-error error="name" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{$category->description}}</textarea>
                                <x-admin.input-error error="description" />
                            </div>
                            <div class="col-md-6 mb-4">
                                <label>Image</label>
                                <input type="file" name="image_file" class="form-control">
                            </div>
                            <div class="col-md-6 mb-4">
                                <label>Status</label>
                                <input type="checkbox" name="status" @checked($category->status == 1)>
                            </div>
                            <div class="col-md-12 mb-4">       
                            <label>Current Image:</label><Br>
                                @if($category->image)
                                    
                                    <img src="{{asset('storage/' . $category->image)}}" style="width:60px; height:60px; border-radius:3px" alt="">
                                @else
                                    <p>- there is no image for this category.</p>
                                @endif
                            </div>
                            <br>
                            <div class="col-md-12 mb-4">    
                                <h3>SEO Tags</h3>
                            </div>
                            <div class="col-md-6 mb-4">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{$category->meta_title}}">
                                <x-admin.input-error error="meta_title" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Meta keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{$category->meta_keyword}}</textarea>
                                <x-admin.input-error error="meta_keyword" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <label>Meta description</label>
                                <textarea type="text" name="meta_description" class="form-control" rows="3">{{$category->meta_description}}</textarea>
                                <x-admin.input-error error="meta_description" />
                            </div>
                            <div class="col-md-12 mb-4">
                                <button type="submit" class="btn btn-primary ">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>