<x-admin-layout title="Add category">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Categories
                        <a href="{{route('admin.categories.index')}}" class="btn btn-primary float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('admin.categories.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                <x-admin.input-error error="name" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea type="text" name="description" class="form-control" rows="3">{{old('description')}}</textarea>
                                <x-admin.input-error error="description" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Image</label>
                                <input type="file" name="image_file" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Status</label>
                                <input type="checkbox" name="status" @checked(old('status'))>
                            </div>
                            <br>
                            <div class="col-md-12 mb-3">    
                                <h3>SEO Tags</h3>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Meta title</label>
                                <input type="text" name="meta_title" class="form-control" value="{{old('meta_title')}}">
                                <x-admin.input-error error="meta_title" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta keyword</label>
                                <textarea type="text" name="meta_keyword" class="form-control" rows="3">{{old('meta_keyword')}}</textarea>
                                <x-admin.input-error error="meta_keyword" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Meta description</label>
                                <textarea type="text" name="meta_description" class="form-control" rows="3">{{old('meta_description')}}</textarea>
                                <x-admin.input-error error="meta_description" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary ">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>